<?php

class Product_user_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function isGuest()
    {
        $id = $this->getUserId();
        return !($id && $id>0);
    }

    public function isAdmin()
    {
        $this->CI->load->model('User_model');
        $role = $this->getRole();
        return $role == User_model::ROLE_ADMIN;
    }


    public function getRole()
    {
        $this->CI->load->library('session');
        return $this->CI->session->userdata('role');
    }

    public function getUserId()
    {
        $this->CI->load->library('session');
        return $this->CI->session->userdata('id');
    }
    public function getUsername()
    {
        $this->CI->load->library('session');
        return $this->CI->session->userdata('username');
    }
    public function online($user_data)
    {
        $this->CI->session->set_userdata($user_data);
    }
    public function offline()
    {
        $this->CI->load->library('session');
        $data = $this->CI->session->userdata();
        foreach ($data as $k=>$v) {
            $this->CI->session->unset_userdata($k);
        }
    }
}
