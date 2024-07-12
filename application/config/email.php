<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Email Configurations
|--------------------------------------------------------------------------
| This configuration is used to send email to user for verification email
| or reset password.
| Make sure you have email server to set this config. If you are on
| development, you can use third party such as Google SMTP or Mailtrap.
| --------------------------------------------------------------------------
| Configurations
|
| 'protocol'    => 'smtp'
| 'smtp_host'   => 'YOUR_SMTP_SERVER',
| 'smtp_port'   => 'YOUR_SMTP_PORT',
| 'smtp_user'   => 'YOUR_SMTP_USER',
| 'smtp_pass'   => 'YOUR_SMTP_PASSWORD',
| 'email_from'  => Email address that will be used as sender.
| 'email_alias' => Display name that user will be seen when receive email message. 
| 
| Leave it as default for 'crlf' and 'newline' config.
*/
$config = array(
    'protocol' => 'smtp',
    'smtp_host' => '',
    'smtp_port' => 2525,
    'smtp_user' => '',
    'smtp_pass' => '',
    'crlf' => "\r\n",
    'newline' => "\r\n",
    'email_from' => 'you@example.com',
    'email_alias' => 'Your Name'
);
