<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $error_message = $this->session->flashdata('error_message');
        $this->session->set_flashdata('error_message', '');
        $data['title'] = 'Login';
        $data['error_message'] = $error_message;
        $this->load->view('templates/header', $data);
        $this->load->view('site/login', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('product_user_library');

        $this->load->database();
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'      => 'You have not provided %s.',
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
        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('error_message', validation_errors());
            redirect("login/view");
        }
        $this->load->model('user_model');
        $query = $this->db->get_where('users', array('email' => $this->input->post('email')));
        $data = $query->row_array();
        if ($data) {
            $pass = $data['password'];
            //			$authenticatePassword = password_verify($this->input->post('password'), $pass);
            if ($data['email_verified'] == User_model::EMAIL_NOT_VERIFIED) {
                $this->session->set_flashdata('error_message', 'the email address has not verified. please check your email');
                redirect('login/view');
            } else {
                if ($pass == md5($this->input->post('password'))) {
                    $user_data = [
                        'id' => $data['id'],
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'role' => $data['role'],
                    ];
                    $this->product_user_library->online($user_data);
                    redirect('login/success');
                } else {
                    $this->session->set_flashdata('error_message', 'Password is incorrect.');
                    redirect('login/view');
                }
            }
        } else {
            $this->session->set_flashdata('error_message', 'Email does not exist.');
            redirect('login/view');
        }
    }

    public function success()
    {
        $this->load->library('product_user_library');
        $is_admin = $this->product_user_library->isAdmin();
        $data['title'] = 'Login Success';
        $data['is_admin'] = $is_admin;
        $this->load->view('templates/header', $data);
        $this->load->view('site/login_success', $data);
        $this->load->view('templates/footer');
    }
}
