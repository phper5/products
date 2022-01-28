<?php

class User_model extends CI_Model
{
    const ROLE_ADMIN = 1;
    const ROLE_MEMBER = 0;
    const EMAIL_VERIFIED = 1;
    const EMAIL_NOT_VERIFIED = 0;

    public function __construct()
    {
        $this->load->database();
    }

    public function register_user()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);

        $data = array(
            'username' => $this->input->post('username'),
            'password' =>  md5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'captcha' => md5($this->input->post('email').time())
        );
        //		password_verify();
        return $this->db->insert('users', $data);
    }
}
