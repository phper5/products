<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function logout()
    {
        $this->load->helper('url');
        $this->load->library('product_user_library');
        $this->product_user_library->offline();
        redirect('login/view');
    }
}
