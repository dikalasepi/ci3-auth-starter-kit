<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error_Page extends CI_Controller
{
    /**
     * Show 404 error page.
     * 
     * @return [type]
     */
    public function page_404()
    {
        $this->load->view('errors/custom/404');
    }
}
