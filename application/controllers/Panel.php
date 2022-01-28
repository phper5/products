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
		$this->load->model('user_model');
        $data['title'] = 'Admin Panel';
		$active_user = $this->getActiveUserNum();
		$verified_user = $this->getVerifiedUserNum();
		$data['active_user'] = $active_user;
		$data['verified_user'] = $verified_user;
        $this->load->view('templates/header', $data);
        $this->load->view('site/panel', $data);
        $this->load->view('templates/footer');
    }

	protected function getActiveUserNum()
	{
		$this->db->where('activie_time  >=', time()-600);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	protected function getVerifiedUserNum()
	{
		$this->db->where('email_verified  =', User_model::EMAIL_VERIFIED);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
}
