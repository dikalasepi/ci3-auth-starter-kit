<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Authentication Configurations
|--------------------------------------------------------------------------
|
| This application provide some authentication features:
| 1. Login
| 2. Register
| 3. Remember me
| 4. Email verification (can be used for activating user)
| 5. Reset password (this feature requires email verification to be enabled)
|
|--------------------------------------------------------------------------
| Configurations
| 'auth_register'       => For "Register" feature. Default value is false.
|                          to enable it, change value to true. You can fill
|                          username field when register or leave it blank.
|                          Email MUST be filled for authentication process.
|                          You can login with username or email.
|
| 'auth_reset'          => For "Reset password" feature. Default value is false.
|                          to enable it, change value to true. If you want to
|                          enable this config, you MUST enable 'auth_verify'.
|
| 'auth_verify'         => For "Email verfication" feature. Default value is false.
|                          to enable it, change value to true. Make sure you use
|                          VALID EMAIL. It will be used for verification process.
| 
| 'auth_token_expiration'    => This is for configure token duration that will be sent
|                          to user to verify email or reset password. Default value
|                          is 5 minutes in seconds.
*/
$config['auth_register'] = true;
$config['auth_reset'] = true;
$config['auth_verify'] = true;
$config['auth_token_expiration'] = 60 * 5;     // 5 minutes in seconds
