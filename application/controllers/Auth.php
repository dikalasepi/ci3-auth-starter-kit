<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    protected $emailService;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('AccessToken_model', 'AccessToken');
        $this->load->model('Auth_model', 'Auth');
        $this->load->model('User_model', 'User');
        $this->load->model('UserCookie_model', 'UserCookie');
    }

    /**
     * Checking whether user has been authenticated or not.
     * 
     * If user has been authenticated, it will redirect to Dahsboard Page.
     * If not, it will show a login page.
     * 
     * @return void
     */
    public function index(): void
    {
        if (isAuthenticated()) {
            redirect(base_url('dashboard'));
        }

        $this->form_validation->set_rules($this->_set_login_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Sign in';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('layouts/auth/header');
        } else {
            $this->_auth_login();
        }
    }

    /**
     * Logging out the user and terminates the session.
     * 
     * @return void
     */
    public function logout(): void
    {
        /** Disallow logout if it's not accessed from logout button. */
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Method not allowed.', 405);
        }

        /** Delete user's cookies if it exists. */
        if (getRememberMeCookie() !== null) {
            $id = getRememberMeCookie()['uid'];
            $token = getRememberMeCookie()['session'];
            $this->UserCookie->delete($id, $token);
        }

        /** Delete user's session */
        $sessionData = ['uid', 'user'];
        $this->session->unset_userdata($sessionData);
        session_destroy();

        redirect(base_url('auth'));
    }

    /**
     * Show forgot password page to a user.
     * 
     * The 'auth_reset' and 'auth_verify' must be set to true in auth.php configuration file.
     * See config/auth.php for the configurations.
     * 
     * @return void
     */
    public function forgot_password(): void
    {
        if (!$this->config->item('auth_reset')) {
            show_error('You have to enable reset password to access this page.', 403, 'Failed');
        }

        if (!$this->config->item('auth_verify')) {
            show_error('You have to enable email verification to access this page.', 403, 'Failed');
        }

        if (isAuthenticated()) {
            show_404();
        }

        $this->form_validation->set_rules($this->_set_forgot_password_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('layouts/auth/header');
        } else {
            $this->_forgot_password($this->input->post('email'));
        }
    }

    /**
     * Show register page to a user.
     * 
     * The 'auth_register' must be set to true in auth.php configuration file.
     * See config/auth.php for the configurations.
     * 
     * @return void
     */
    public function register(): void
    {
        if (!$this->config->item('auth_register')) {
            show_error('You have to enable register to access this page.', 403, 'Failed');
        }

        if (isAuthenticated()) {
            redirect(base_url('dashboard'));
        }

        $this->form_validation->set_rules($this->_set_register_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Sign up';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('layouts/auth/header');
        } else {
            $this->_auth_register();
        }
    }

    /**
     * Process resetting user's password. If reset process fails, it will shows invalid page.
     * 
     * The 'auth_reset' and 'auth_verify' must be set to true in auth.php configuration file.
     * See config/auth.php for the configurations.
     * 
     * @return void
     */
    public function reset_password(): void
    {
        if (!$this->config->item('auth_reset')) {
            show_error('You have to enable reset password to access this page.', 403, 'Failed');
        }

        if (isAuthenticated()) {
            redirect(base_url('dashboard'));
        }

        try {
            /** If token is not found in the database, show error message to the user. */
            $validToken = $this->_valid_token();
            if ($validToken === null) {
                throw new Exception('Invalid email or token');
            }

            if ($this->_reset_password_validation()) {
                $user = $this->User->getSingleUser('email', $validToken->email);
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                /** If reset password fails, show error message to the user. */
                if (!$this->User->resetPassword($user, $password)) {
                    $this->AccessToken->delete($validToken->email);
                    throw new Exception('Failed to reset password.');
                }

                $this->AccessToken->delete($validToken->email);
                $this->session->set_flashdata('message', 'Your account\'s password has been successfully reset. Please login.');
                redirect(base_url('auth'));
            }
        } catch (Exception $e) {
            /** Show invalid page and the error message. */
            $this->session->set_flashdata('error', $e->getMessage());
            $this->_send_invalid_page('Reset password failed', 'Make sure your email is correct and your token is valid. You can try to reset password by click <a href="' . base_url('auth/forgot_password') . '">this link</a> and provide your email.');
        }
    }

    /**
     * Show resend verification page.
     * 
     * @return void
     */
    public function resend_verification(): void
    {
        if (!$this->config->item('auth_verify')) {
            show_error('You have to enable email verification to access this page.', 403, 'Failed');
        }

        if (isAuthenticated()) {
            show_404();
        }

        $this->form_validation->set_rules($this->_set_resend_verification_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Account Activation';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/resend-verification');
            $this->load->view('layouts/auth/footer');
        } else {
            $this->verification($this->input->post('email'));
        }
    }

    /**
     * Email verification process.
     * 
     * It will take the email from change email page using 'POST' method 
     * or it will take the email from button verification in the user's email message,
     * as 'GET' method.
     * 
     * @param string|null $email
     * 
     * @return void
     */
    public function verification(?string $email = null): void
    {
        if (isAuthenticated()) {
            show_404();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
        } else {
            $email = $this->input->get('email');
        }

        /** Send error message if there is no email provided. */
        if (!$email) {
            $this->session->set_flashdata('error', 'Please provide an email.');
            redirect($this->agent->referrer());
        }

        $user = $this->User->getSingleUser('email', $email);

        /** Send error message if the email is not registered. */
        if ($user === null) {
            $this->session->set_flashdata('error', 'This email is not registered yet.');
            redirect($this->agent->referrer());
        }

        /** Send error message if the email is already activated. */
        if ($user->is_active) {
            $this->session->set_flashdata('error', 'This email is already active.');
            redirect($this->agent->referrer());
        } else {
            $this->_verification($user);
        }
    }

    /**
     * Check whether email or token is provided on verification url.
     * 
     * @return void
     */
    public function verify(): void
    {
        if (isAuthenticated()) {
            redirect(base_url('dashboard'));
        }

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        if ($email && $token) {
            try {
                $this->_verify($email, $token);
            } catch (Exception $e) {
                $this->session->set_flashdata('error', $e->getMessage());
                $this->_send_invalid_page('Activation account failed', 'Make sure your email is correct and your token is valid. You can try to re-activate by click <a href="' . base_url('auth/resend_verification') . '">this link</a> and provide your email.');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email or token.');
            $this->_send_invalid_page('Activation account failed', 'Make sure your email is correct and your token is valid. You can try to re-activate by click <a href="' . base_url('auth/resend_verification') . '">this link</a> and provide your email.');
        }
    }

    /**
     * Process of authenticating a user.
     * 
     * @return void
     */
    private function _auth_login(): void
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Method not allowed.', 405);
        }

        $data['username'] = htmlspecialchars($this->input->post('username', true));
        $data['password'] = $this->input->post('password');
        $data['remember'] = $this->input->post('remember') ? true : false;

        /** Attempt to find user in the database. */
        $user = $this->Auth->attemptLogin($data);

        if ($user === null) {
            $this->session->set_flashdata('error', 'Invalid username or password.');
            $this->session->set_flashdata('username', $this->input->post('username'));
            redirect(base_url('auth'));
        }

        /** If the user is found in the database but the 'is_active' value is 0 and the email verification is enable,
         * login process failed, and the user has to activate the email first.
         */
        $useEmailVerification = $this->config->item('auth_verify');
        if ($useEmailVerification && !$user->is_active) {
            $email = $user->email;
            $this->session->set_flashdata('error', 'Your account hasn\'t been active. <a target="_blank" href="' . base_url('auth/verification?email=') . $email . '" class="text-white"><strong><u>Please verify your email.</u></strong></a>');
            redirect(base_url('auth'));
        }

        $sessionData = [
            'uid' => password_hash($user->unique_id, PASSWORD_DEFAULT),
            'user' => $user->email
        ];

        $this->session->set_userdata($sessionData);
        redirect(base_url('dashboard'));
    }

    /**
     * Process of registering a new user.
     * 
     * @return void
     */
    private function _auth_register(): void
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Method not allowed.', 405);
        }

        $useEmailVerification = $this->config->item('auth_verify');

        $fields = $this->User->getFillable();
        $data = [];
        foreach ($fields as $field) {
            $data[$field] = htmlspecialchars($this->input->post($field, true));
            if ($field === 'password') {
                $data[$field] = password_hash($this->input->post($field), PASSWORD_DEFAULT);
            }
        }

        /** Process registering a new user and store it in the database. */
        $user = $this->Auth->attemptRegister($data);

        if ($useEmailVerification) {
            $email = $user->email;
            $this->session->set_flashdata('message', 'Your account has been successfully created. <a target="_blank" href="' . base_url('auth/verification?email=') . $email . '" class="text-white"><strong><u>Please verify your email.</u></strong></a>');
        } else {
            $this->session->set_flashdata('message', 'Your account has been successfully created. Please Login.');
        }
        redirect(base_url('auth'));
    }

    /**
     * Process checking email and user's status (whether it has been verified or not).
     * 
     * @param string $email
     * 
     * @return [type]
     */
    private function _forgot_password(string $email)
    {
        $email = $this->input->post('email');
        $user = $this->User->getSingleUser('email', $email);

        if ($user === null) {
            $this->session->set_flashdata('error', 'This email is not registered.');
            redirect(base_url('auth/forgot_password'));
        }

        if (!$user->is_active) {
            $this->session->set_flashdata('error', 'This email has not been verified. <a target="_blank" href="' . base_url('auth/verification?email=') . $user->email . '" class="text-white"><strong><u>Please verify your email.</u></strong></a>');
            redirect(base_url('auth/forgot_password'));
        }

        $this->_forgot($user);
    }

    /**
     * Process sending reset email message and show information page.
     * 
     * @param stdClass $user
     * 
     * @return void
     */
    private function _forgot(stdClass $user): void
    {
        try {
            $token = $this->AccessToken->generateToken($user->email);
            $token['token'] = password_hash($token['token'], PASSWORD_DEFAULT);

            $data['title'] = 'Reset Password';
            $data['button_text'] = 'Reset Password';
            $data['app_name'] = $this->config->item('app_name');
            $data['full_name'] = $user->full_name;
            $data['url'] = base_url('auth/reset_password?email=') . $user->email . '&token=' . $token['token'];
            $data['duration'] = $this->config->item('auth_token_expiration') / 60; // in minutes

            if (!$this->Auth->sendEmail($user->email, 'reset', $data)) {
                $this->AccessToken->delete($user->email);
                throw new Exception('Failed to send email.');
            }

            $data['title'] = 'Send Reset Link';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/send-reset-link');
            $this->load->view('layouts/auth/header');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect(base_url('auth'));
        }
    }

    /**
     * Process validate for resetting password.
     * 
     * @return bool
     */
    private function _reset_password_validation(): bool
    {
        $this->form_validation->set_rules($this->_set_reset_password_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Reset Password';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/reset-password');
            $this->load->view('layouts/auth/footer');
            return false;
        } else {
            return true;
        }
    }

    /**
     * Send the invalid page with the heading and message that is provided.
     * 
     * @param string $heading
     * @param string $message
     * 
     * @return void
     */
    private function _send_invalid_page(string $heading, string $message): void
    {
        $data['title'] = 'Invalid Page';
        $data['heading'] = $heading;
        $data['message'] = $message;
        $this->load->view('layouts/auth/header', $data);
        $this->load->view('auth/invalid-page', $data);
        $this->load->view('layouts/auth/header');
    }

    /**
     * A set of rules for forgotten password validation.
     * 
     * @return array
     */
    private function _set_forgot_password_rules(): array
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => ['required', 'valid_email'],
                'errors' => [
                    'required' => 'Please provide an email.',
                    'valid_email' => 'Please provide an valid email.'
                ]
            ]
        ];
    }

    /**
     * A set of rules for logged-in validation.
     * 
     * @return array
     */
    private function _set_login_rules(): array
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => ['required', 'trim']
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => ['required']
            ]
        ];
    }

    /**
     * A set of rules for registered validation.
     * 
     * @return array
     */
    private function _set_register_rules(): array
    {
        $usernameRules = $this->input->post('username')
            ? ['required', 'trim', 'max_length[20]', 'is_unique[users.username]']
            : [];

        $rules = [
            [
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => ['required', 'trim', 'max_length[60]'],
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => $usernameRules,
                'errors' => [
                    'is_unique' => 'This %s is already used.'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => ['required', 'trim', 'valid_email', 'is_unique[users.email]', 'max_length[50]'],
                'errors' => [
                    'is_unique' => 'The %s has already been registered.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => ['required', 'min_length[6]', 'matches[password_confirmation]']
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Password Confirmation',
                'rules' => ['required']
            ]
        ];

        return $rules;
    }

    /**
     * A set of rules for resent verification validation.
     * 
     * @return array
     */
    private function _set_resend_verification_rules(): array
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => ['required', 'valid_email'],
                'errors' => [
                    'required' => 'Please provide an email.',
                    'valid_email' => 'Please provide an valid email.'
                ]
            ]
        ];
    }

    /**
     * A set of rules for reset password validation.
     * 
     * @return array
     */
    private function _set_reset_password_rules(): array
    {
        return [
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => ['required', 'min_length[6]', 'matches[password_confirmation]']
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Password Confirmation',
                'rules' => ['required']
            ]
        ];
    }

    /**
     * Check whether a token is valid and return it.
     * Otherwise return null.
     * 
     * @return stdClass|null
     */
    private function _valid_token(): ?stdClass
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        if ($email && $token) {
            $accessToken = $this->AccessToken->getSingleToken('email', $email);
            if ($accessToken === null) {
                throw new Exception('Invalid email or token.');
            }
            if (!password_verify($accessToken->token, $token)) {
                throw new Exception('Invalid email or token.');
            }
            if ($accessToken->expiration_date < date('Y-m-d H:i:s')) {
                $this->AccessToken->delete($accessToken->email);
                throw new Exception('Token has been expired.');
            }

            return $accessToken;
        }
        return null;
    }

    /**
     * Process for sending verification email message to the user.
     * 
     * @param stdClass $user
     * 
     * @return void
     */
    private function _verification(stdClass $user): void
    {
        $token = $this->AccessToken->generateToken($user->email);
        $token['token'] = password_hash($token['token'], PASSWORD_DEFAULT);

        $data['title'] = 'Email Verification';
        $data['button_text'] = 'Verify Email Address';
        $data['app_name'] = $this->config->item('app_name');
        $data['full_name'] = $user->full_name;
        $data['url'] = base_url('auth/verify?email=') . $user->email . '&token=' . $token['token'];
        $data['duration'] = $this->config->item('auth_token_expiration') / 60; // in minutes

        try {
            if (!$this->Auth->sendEmail($user->email, 'verify', $data)) {
                $this->AccessToken->delete($user->email);
                throw new Exception('Failed to send email.');
            }

            $data['title'] = 'Send Verification Link';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/send-verification-link');
            $this->load->view('layouts/auth/footer');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect(base_url('auth/resend_verification'));
        }
    }

    /**
     * Process for verifying token for verfying a user.
     * 
     * @param string $email
     * @param string $token
     * 
     * @return bool
     */
    private function _verify(string $email, string $token): bool
    {
        $accessToken = $this->AccessToken->getSingleToken('email', $email);
        if ($accessToken === null) {
            throw new Exception('Invalid email or token.');
        }

        if (!password_verify($accessToken->token, $token)) {
            throw new Exception('Invalid email or token.');
        }

        if ($accessToken->expiration_date < date('Y-m-d H:i:s')) {
            $this->AccessToken->delete($accessToken->email);
            throw new Exception('Token has been expired.');
        }

        $user = $this->User->getSingleUser('email', $accessToken->email);
        if (!$this->User->activate($user->email)) {
            $this->AccessToken->delete($accessToken->email);
            throw new Exception('Failed to activate account.');
        }

        $this->AccessToken->delete($accessToken->email);
        $this->session->set_flashdata('message', 'Your account has been activated. Please login.');
        redirect(base_url('auth'));
    }
}
