<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('dd')) {
    /**
     * A shortcut to var_dump and die.
     * Use like: dd($var1, $var2);
     * 
     * @param mixed ...$vars
     * 
     * @return void
     */
    function dd(...$vars): void
    {
        echo "<pre>";
        print_r($vars);
        echo "</pre>";
        die;
    }
}

if (!function_exists('flashdata')) {
    /**
     * A shortcut to get flashdata.
     * Use like: flashdata('item')
     * 
     * @param string $key
     * 
     * @return string|null
     */
    function flashdata(string $key): ?string
    {
        $ci = &get_instance();
        return $ci->session->flashdata($key);
    }
}
