<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('product_auth_library');
        $this->product_auth_library->auth();
    }
    public function view()
    {
        $data['title'] = 'Admin Panel';
        $this->load->view('templates/header', $data);
        $this->load->view('site/panel', $data);
        $this->load->view('templates/footer');
    }
}
