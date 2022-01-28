<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Register';
        $error_message = $this->session->flashdata('error_message');
        $this->session->set_flashdata('error_message', '');
        $this->load->view('templates/header', $data);
        $data['error_message'] = $error_message;
        $this->load->view('site/register', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->database();
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|min_length[5]|max_length[100]',
            array(
                'required'      => 'You have not provided %s.',
            )
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[users.email]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]|max_length[20]',
            array(
                'required'      => 'You have not provided %s.',
            )
        );
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error_message', validation_errors());
            redirect("register/view");
        }
        $this->load->model('user_model');
        if ($this->user_model->register_user()) {
            $query = $this->db->get_where('users', array('email' => $this->input->post('email')));
            $data = $query->row_array();
            //			$this->load->library('encrypt');
            $this->load->library('product_encrypt_library');
            $code = $this->product_encrypt_library->encode($data['email'].'-----'.$data['captcha']);
            $this->session->set_flashdata('code', $code);
            redirect("register/success");
        } else {
            $this->session->set_flashdata('error_message', 'register failed ');
            redirect("register/view");
        }
    }

    public function success()
    {
        $this->load->library('session');
        $code = $this->session->flashdata('code');
        //		$this->session->set_flashdata('code', '');
        $data['title'] = 'Register Success';
        $data['code'] = urlencode($code);
        $this->load->view('templates/header', $data);
        $this->load->view('site/register_success', $data);
        $this->load->view('templates/footer');
    }
}
