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
		$this->output->enable_profiler(TRUE);

		$active_user_active_product = $this->getActiveUserAttachedActiveProductNum();

		$data['active_user'] = $active_user;
		$data['verified_user'] = $verified_user;
		$data['active_user_active_product'] = $active_user_active_product;
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
	protected function getActiveUserAttachedActiveProductNum()
	{
		$this->load->model('product_model');
		$this->db->select('users.id');
		$this->db->distinct();
		$this->db->from('users');
		$this->db->where('users.activie_time  >=', time()-600);
		$this->db->where('email_verified  =', User_model::EMAIL_VERIFIED);
		$this->db->join('attaches', 'users.id = attaches.user_id', 'left');
		$this->db->join('products', 'attaches.product_id = products.id', 'left');
		$this->db->where('products.status  =', Product_model::STATIS_ACTIVE);
		return $this->db->count_all_results('',false);
	}
}
