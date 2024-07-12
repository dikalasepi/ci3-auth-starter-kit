<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isAuthenticated()) {
            return redirect(base_url('auth'));
        }
    }
    /**
     * Show dahsboard page.
     * 
     * @return [type]
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('layouts/dashboard/header', $data);
        $this->load->view('layouts/dashboard/header');
        $this->load->view('layouts/dashboard/sidebar');
        $this->load->view('layouts/dashboard/navbar');
        $this->load->view('layouts/dashboard/body');
        $this->load->view('dashboard');
        $this->load->view('layouts/dashboard/footer');
    }
}
