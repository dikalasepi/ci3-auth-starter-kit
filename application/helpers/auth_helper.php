<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This is some functions related to authentication process.
 */

if (!function_exists('getRememberMeCookie')) {
    /**
     * This is function to get cookie that generated
     * when you check Remember checkbox
     * 
     * @return array|null
     */
    function getRememberMeCookie(): ?array
    {
        if (isset($_COOKIE['uid']) && $_COOKIE['session']) {
            return [
                'uid' => $_COOKIE['uid'],
                'session' => $_COOKIE['session']
            ];
        } else {
            return null;
        }
    }
}

if (!function_exists('isAuthenticated')) {
    /**
     * This is function to check wether user
     * has been authenticated or not.
     * 
     * @return bool
     */
    function isAuthenticated(): bool
    {
        $CI = get_instance();
        $CI->load->model('UserCookie_model', 'UserCookie');

        if (getRememberMeCookie() !== null) {
            $id = getRememberMeCookie()['uid'];
            $token = getRememberMeCookie()['session'];

            $userCookie = $CI->UserCookie->getSingleCookie('id', $id);

            if ($userCookie !== null) {
                if (password_verify($userCookie->token, $token)) {
                    $useVerificationEmail = $CI->config->item('auth_verify');
                    if ($useVerificationEmail) {
                        $CI->load->model('User_model', 'User');
                        $user = $CI->User->getSingleUser('email', $userCookie->email);
                        if ($user !== null && !$user->is_active) {
                            $CI->UserCookie->delete($id, $token);
                            return false;
                        }
                    }

                    if ($userCookie->expiration_date > date('Y-m-d H:i:s')) {
                        return true;
                    }
                }
            }
        }

        /** Delete user cookies that has been expired. */
        $CI->UserCookie->empty();

        /** if user doesn't have cookie or the cookie is invalid, check user's session */
        if ($CI->session->userdata('uid') && $CI->session->userdata('user')) {
            $email = $CI->session->userdata('user');
            $uid = $CI->session->userdata('uid');

            $CI->load->model('User_model', 'User');
            $user = $CI->User->getSingleUser('email', $email);

            if ($user === null) {
                return false;
            }

            if (password_verify($user->unique_id, $uid)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('auth')) {
    function auth(): ?stdClass
    {
        if (!isAuthenticated()) {
            return null;
        }

        $CI = get_instance();
        $CI->load->model('User_model', 'User');

        if (getRememberMeCookie() !== null) {
            $CI->load->model('UserCookie_model', 'UserCookie');
            $user = $CI->UserCookie->getSingleCookie('id', getRememberMeCookie()['uid']);
            if ($user !== null && password_verify($user->token, getRememberMeCookie()['session'])) {
                $email = $user->email;
            }
        } else {
            $email = $CI->session->userdata('user');
        }

        $row = $CI->User->getSingleUser('email', $email);

        return $row;
    }
}
