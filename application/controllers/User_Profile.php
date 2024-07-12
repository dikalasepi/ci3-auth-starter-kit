<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isAuthenticated()) {
            redirect(base_url('auth'));
        }

        $this->load->library('form_validation');
        $this->load->model('AccessToken_model', 'AccessToken');
        $this->load->model('User_model', 'User');
    }

    /**
     * Show a change email form page.
     * 
     * @return void
     */
    public function change_email(): void
    {
        /** Check whether the token is valid or not. */
        $token = $this->input->get('token');
        if (!$token) {
            $this->session->set_flashdata('error', 'Invalid token. Change email failed.');
            redirect(base_url('user/profile'));
        }
        $userToken = $this->AccessToken->getSingleToken('email', auth()->email);
        if (!password_verify($userToken->token, $token)) {
            $this->session->set_flashdata('error', 'Token doesn\'t match. Change email failed.');
            redirect(base_url('user/profile'));
        }

        $this->form_validation->set_rules($this->_set_change_email_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Change Email';
            $this->load->view('layouts/profile/header', $data);
            $this->load->view('user/change-email');
            $this->load->view('layouts/profile/footer');
        } else {
            /** Check token expiration. */
            if ($userToken->expiration_date < date('Y-m-d H:i:s')) {
                $this->AccessToken->delete(auth()->email);
                $this->session->set_flashdata('error', 'Token has expired. Failed change email.');
                redirect(base_url('user/profile'));
            }
            $this->_change_email();
        }
    }

    /**
     * Show a change password form page.
     * 
     * @return void
     */
    public function change_password(): void
    {
        /** Check whether the token is valid or not. */
        $token = $this->input->get('token');
        if (!$token) {
            $this->session->set_flashdata('error', 'Invalid token. Change password failed.');
            redirect(base_url('user/profile'));
        }
        $userToken = $this->AccessToken->getSingleToken('email', auth()->email);
        if (!password_verify($userToken->token, $token)) {
            $this->session->set_flashdata('error', 'Invalid token. Change password failed.');
            redirect(base_url('user/profile'));
        }

        $this->form_validation->set_rules($this->_set_change_password_rules());
        if ($this->form_validation->run() === false) {
            $data['title'] = 'Change Password';
            $this->load->view('layouts/profile/header', $data);
            $this->load->view('user/change-password');
            $this->load->view('layouts/profile/footer');
        } else {
            /** Check token expiration. */
            if ($userToken->expiration_date < date('Y-m-d H:i:s')) {
                $this->AccessToken->delete(auth()->email);
                $this->session->set_flashdata('error', 'Token has expired. Failed change password.');
                redirect(base_url('user/profile'));
            }
            $this->_change_password();
        }
    }

    /**
     * Process for changing user's email.
     * 
     * @return [type]
     */
    private function _change_email()
    {
        $newEmail = $this->input->post('new_email', TRUE);
        $fullName = auth()->full_name;
        try {
            /** Try to deactivate the user first. */
            if (!$this->User->deactivate(auth()->email)) {
                $this->AccessToken->delete(auth()->email);
                throw new Exception('Failed to deactivate user.');
            }

            /** Try to change user's email */
            if (!$this->User->updateEmail($newEmail)) {
                $this->AccessToken->delete(auth()->email);
                throw new Exception('Failed to change email.');
            }

            $this->load->model('Auth_model', 'Auth');
            $token = $this->AccessToken->generateToken($newEmail);
            $token['token'] = password_hash($token['token'], PASSWORD_DEFAULT);

            $data['title'] = 'Email Verification';
            $data['button_text'] = 'Verify Email Address';
            $data['app_name'] = $this->config->item('app_name');
            $data['full_name'] = $fullName;
            $data['url'] = base_url('auth/verify?email=') . $newEmail . '&token=' . $token['token'];
            $data['duration'] = $this->config->item('auth_token_expiration') / 60; // in minutes

            /** Try to send an email message to user to verify the new email. */
            if (!$this->Auth->sendEmail($newEmail, 'change-email', $data)) {
                $this->AccessToken->delete($newEmail);
                throw new Exception('Failed to send email.');
            }

            $data['title'] = 'Send Verification Link';
            $this->load->view('layouts/auth/header', $data);
            $this->load->view('auth/send-verification-link');
            $this->load->view('layouts/auth/footer');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e->getMessage());
            redirect(base_url('user/profile'));
        }
    }

    /**
     * Process for changing user's password.
     * 
     * @return void
     */
    private function _change_password(): void
    {
        $this->User->updatePassword($this->input->post('new_password', TRUE));
        $this->AccessToken->delete(auth()->email);
        $this->session->set_flashdata('message', 'Password has been successfully updated.');
        redirect(base_url('user/profile'));
    }

    /**
     * A confirmation modal for user to enter the password before change email or change password.
     * 
     * @return void
     */
    public function check_password(): void
    {
        /** Check whether the request is from an ajax request. */
        if (!$this->input->is_ajax_request()) {
            $this->session->set_flashdata('error', 'Failed to change password.');
            redirect(base_url('user/profile'));
        }

        $this->form_validation->set_rules($this->_set_current_password_rules());
        if ($this->form_validation->run() === false) {
            $errors = [
                'current_password' => form_error('current_password')
            ];

            /** Send error response if validation fails. */
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'errors' => $errors
                ]));
        } else {
            if (!$this->_check_password($this->input->post('current_password'))) {
                $errors = [
                    'current_password' => 'Incorrect password.'
                ];

                /** Send error response when validation is success but the given password was wrong. */
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(
                        json_encode([
                            'status' => 'error',
                            'errors' => $errors
                        ])
                    );
            } else {
                $changeType = $this->input->post('type') ?? '';
                switch ($changeType) {
                    case 'email':
                        $url = base_url('user/profile/change_email?token=');
                        break;
                    case 'password':
                        $url = base_url('user/profile/change_password?token=');
                        break;
                    default:
                        $url = base_url('user/profile');
                }

                $data = $this->AccessToken->generateToken(auth()->email);
                $tokenHashed = password_hash($data['token'], PASSWORD_DEFAULT);

                /** Send response to the user and then will redirect to the suitable page.
                 * Process of redirect is done on the views.
                 */
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(
                        json_encode([
                            'status' => 'success',
                            'data' => [
                                'url' => $url,
                                'token' => $tokenHashed
                            ]
                        ])
                    );
            }
        }
    }

    /**
     * Show an edit profile form page.
     * 
     * @return void
     */
    public function edit_profile(): void
    {
        $this->form_validation->set_rules($this->_set_edit_profile_rules());

        if ($this->form_validation->run() === false) {
            $data['title'] = 'Edit Profile';
            $this->load->view('layouts/profile/header', $data);
            $this->load->view('user/edit-profile');
            $this->load->view('layouts/profile/footer');
        } else {
            $this->_edit_profile();
        }
    }

    /**
     * Show a user profile page.
     * 
     * @return void
     */
    public function profile(): void
    {
        $data['title'] = 'Profile';
        $this->load->view('layouts/profile/header', $data);
        $this->load->view('user/profile');
        $this->load->view('layouts/profile/footer');
    }

    /**
     * Verify password.
     * 
     * @param string $password
     * 
     * @return bool
     */
    private function _check_password(string $password): bool
    {
        return password_verify($password, auth()->password);
    }

    /**
     * Process for updating the user's data and update it to the database.
     * 
     * @return void
     */
    private function _edit_profile(): void
    {
        /** Check whether _method is set and the value is put. */
        if (!isset($_POST['_method']) && ($_POST['_method'] !== 'PUT' || $_POST['_method'] !== 'put')) {
            show_error('Method not allowed.', 405, 'Failed');
        }

        $field['full_name'] = htmlspecialchars($this->input->post('full_name'));
        $field['username'] = htmlspecialchars($this->input->post('username'));
        $field['email'] = htmlspecialchars($this->input->post('email'));

        $this->User->update($field);

        $this->session->set_flashdata('message', 'Your profile has been updated.');
        redirect(base_url('user/profile'));
    }

    /**
     * A set of rules for changing a user's email.
     * 
     * @return array
     */
    private function _set_change_email_rules(): array
    {
        return [
            [
                'field' => 'new_email',
                'label' => 'Email',
                'rules' => ['required', 'trim', 'valid_email', 'is_unique[users.email]', 'max_length[50]'],
                'errors' => [
                    'required' => 'Please provide an email.',
                    'valid_email' => 'Please provide an valid email.',
                    'is_unique' => 'This %s is already used.'
                ]
            ]
        ];
    }

    /**
     * A set of rules for changing a user's password.
     * 
     * @return array
     */
    private function _set_change_password_rules(): array
    {
        return [
            [
                'field' => 'new_password',
                'label' => 'New Password',
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
     * A set of rules for checking a user's current password.
     * 
     * @return array
     */
    private function _set_current_password_rules(): array
    {
        return [
            [
                'field' => 'current_password',
                'label' => 'Current Password',
                'rules' => ['required']
            ]
        ];
    }

    /**
     * A set of rules for updating a user's data.
     * 
     * @return array
     */
    private function _set_edit_profile_rules(): array
    {
        /** Create custom rules if a username input is filled. */
        $id = $this->input->post('id');
        $usernameRules = $this->input->post('username')
            ? ['required', 'trim', 'max_length[20]', 'is_unique[users.id!=' . $id . ' AND ' . 'username=]']
            : [];

        return [
            [
                'field' => 'full_name',
                'label' => 'Full Name',
                'rules' => ['required', 'trim', 'max_length[60]']
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => ['required', 'trim', 'valid_email', 'max_length[50]', 'is_unique[users.id!=' . $id . ' AND ' . 'email=]'],
                'errors' => [
                    'is_unique' => 'The %s is already used.'
                ]
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => $usernameRules,
                'errors' => [
                    'is_unique' => 'This %s is already used.'
                ]
            ]
        ];
    }
}
