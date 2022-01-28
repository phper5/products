<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('product_auth_library');
        $this->product_auth_library->auth();
    }
    public function index()
    {
        $this->load->model('product_model');
        $data['title'] = 'product list';
        $data['products'] = $this->product_model->getProducts();
        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }
    public function manage()
    {
        $this->load->helper('form');
        $this->load->model('product_model');
        $data['title'] = 'product list';
        $data['products'] = $this->product_model->getProducts();
        $this->load->view('templates/header', $data);
        $this->load->view('product/manage', $data);
        $this->load->view('templates/footer');
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->delete('products', ['id' => $id]);
        $url = $_SERVER['HTTP_REFERER'];
        if (!$url) {
            redirect('product/manage');
        }
        redirect($url);
    }
    public function edit($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('product_model');
        $data['item'] = $this->product_model->getProduct($id);

        if (empty($data['item'])) {
            show_404();
        }
        $data['title'] = $data['item']['title'];
        $this->form_validation->set_rules('title', 'Title', 'required');
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('product/edit');
            $this->load->view('templates/footer');
        } else {
            $this->db->update('products', [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image' => $this->input->post('image'),
            ], array('id' => $id));
            $this->load->view('product/success');
        }
    }
    public function view($id)
    {
        $this->load->model('product_model');
        $data['item'] = $this->product_model->getProduct($id);

        if (empty($data['item'])) {
            show_404();
        }

        $data['title'] = $data['item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('product/view', $data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'add a new product';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->load->model('product_model');
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('product/create');
            $this->load->view('templates/footer');
        } else {
            $this->product_model->add_product();
            $this->load->view('product/success');
        }
    }
}
