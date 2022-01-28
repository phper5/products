<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('product_auth_library');
        $this->product_auth_library->auth();
    }
    public function verify($code)
    {
        $this->load->model('user_model');
        $this->load->library('product_encrypt_library');
        $code = $this->product_encrypt_library->decode(urldecode($code));
        $tmp = explode('-----', $code);
        $query = $this->db->get_where('users', array('email' => $tmp[0]));
        $data = $query->row_array();

        if ($data && $data['captcha'] == $tmp[1]) {
            $new_data = [];
            $new_data['captcha']='';
            $new_data['email_verified']=1;
            $this->db->update('users', $new_data, array('email' => $tmp[0]));
            redirect('user/verified');
        } else {
            redirect('user/verifyFailed');
        }
    }
    public function verified()
    {
        $data['title'] = 'Verified';
        $this->load->view('templates/header', $data);
        $this->load->view('user/verified', $data);
        $this->load->view('templates/footer');
    }
    public function verifyFailed()
    {
        $data['title'] = 'Verified Failed';
        $this->load->view('templates/header', $data);
        $this->load->view('user/verify_failed', $data);
        $this->load->view('templates/footer');
    }
}
