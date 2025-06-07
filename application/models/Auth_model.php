<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'User');
    }

    /**
     * Attempt for registering a new user and store it in the database.
     * 
     * @param array $fields
     * 
     * @return stdClass
     */
    public function attemptRegister(array $fields): stdClass
    {
        /**
         * Generate random string for 'unique_id' field of users table.
         */
        $fields['unique_id'] = base64_encode(random_bytes(64));

        $this->User->store($fields);
        return (object) $fields;
    }

    /**
     * Attempt to login user.
     * 
     * @param array $data
     * 
     * @return stdClass|null
     */
    public function attemptLogin(array $data): ?stdClass
    {
        $row = $this->User->getAttemptUser($data['username']);

        if ($row === null) {
            return null;
        }

        if (!password_verify($data['password'], $row->password)) {
            return null;
        }

        /** Store user's cookie if 'Remember me' checkbox is checked. */
        if ($data['remember']) {
            $this->load->model('UserCookie_model', 'UserCookie');
            $this->load->library('user_agent');
            $cookie['email'] = $row->email;
            $cookie['token'] = base64_encode(random_bytes(64));
            $cookie['is_browser'] = $this->agent->is_browser() ? true : false;
            $cookie['is_mobile'] = $this->agent->is_mobile() ? true : false;
            $cookie['browser_name'] = $this->agent->browser();
            $cookie['browser_version'] = $this->agent->version();
            $cookie['mobile_device'] = $this->agent->mobile();
            $cookie['device_platform'] = $this->agent->platform();
            $this->UserCookie->store($cookie);
        }

        return $row;
    }

    /**
     * Send email to user.
     * 
     * @param string $to
     * @param string $type
     * @param array $data
     * 
     * @return bool
     */
    public function sendEmail(string $to, string $type = 'verify', array $data = []): bool
    {
        $this->load->library('email');
        $this->email
            ->set_mailtype('html')
            ->from($this->config->item('email_from'), $this->config->item('email_alias'));
        switch ($type) {
            case 'verify':
                $message = $this->load->view('email/verification', $data, true);
                $this->email
                    ->to($to)
                    ->subject('Email Verification')
                    ->message($message);
                break;
            case 'reset':
                $message = $this->load->view('email/reset', $data, true);
                $this->email
                    ->to($to)
                    ->subject('Reset Password')
                    ->message($message);
                break;
            case 'change-email':
                $message = $this->load->view('email/verification-change-email', $data, true);
                $this->email
                    ->to($to)
                    ->subject('Email Verification')
                    ->message($message);
                break;
            default:
                return false;
        }

        if (!$this->email->send()) {
            if (ENVIRONMENT !== 'production') {
                throw new Exception($this->email->print_debugger());
            } else {
                throw new Exception('Sending email process is failed. Please try again later.');
            }
        }

        return true;
    }
}
