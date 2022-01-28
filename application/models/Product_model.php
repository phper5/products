<?php

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * @todo  pagination
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function getProducts($offset = 0, $limit = 20)
    {
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getProduct($id)
    {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }
    public function add_product()
    {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'image' => $this->input->post('image'),
            'timestamps' => time(),
            'status' => 0
        );
        return $this->db->insert('products', $data);
    }
}