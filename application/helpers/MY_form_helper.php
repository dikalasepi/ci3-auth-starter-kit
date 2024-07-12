<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('method_field')) {
    /**
     * This function is purposed to create http method spoofing,
     * but I think it does not work as expected. If you want to
     * use this function, you can validate the `_method` field in your
     * controller.
     * 
     * Example:
     * if (
     *     !isset($_POST['_method']) 
     *     && (
     *         $_POST['_method'] !== 'PUT' 
     *         || $_POST['_method'] !== 'put'
     *        )
     *    ) 
     * {
     *     show_error('Method not allowed.', 405, 'Failed');
     * }
     * 
     * @param string $method
     * 
     * @return string
     */
    function method_field(string $method): string
    {
        return '<input type="hidden" name="_method" value="' . strtoupper($method) . '">';
    }
}

if (!function_exists(('csrf_name'))) {
    /**
     * A shortcut to get the CSRF token name.
     * 
     * @return string
     */
    function csrf_name(): string
    {
        $CI = get_instance();
        return $CI->security->get_csrf_token_name() ?? '';
    }
}

if (!function_exists('csrf_value')) {
    /**
     * A shortcut to get the CSRF token value.
     * 
     * @return string
     */
    function csrf_value(): string
    {
        $CI = get_instance();
        return $CI->security->get_csrf_hash() ?? '';
    }
}
