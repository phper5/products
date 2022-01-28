<?php

class Product_auth_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function auth()
    {
        $class = $this->CI->router->class;
        $method = $this->CI->router->method;
        $this->CI->load->library('product_user_library');
        $this->CI->load->helper('url');
        $is_admin = $this->CI->product_user_library->isAdmin();
        $is_guest = $this->CI->product_user_library->isGuest();
        $needle = strtolower($class.'.'.$method);
        if (!$is_guest) {
            $this->CI->db->update('users', [
                'activie_time' => time(),
            ], array('id' => $this->CI->product_user_library->getUserId()));
        }
        //admin
        if (!$is_admin && in_array($needle, ['panel.view','product.view','product.manage','product.edit','product.create','product.delete'])) {
            return redirect("product/index");
        }
        //member
        if ($is_guest && in_array($needle, ['login.success','product.index','product.attach'])) {
            return redirect("login/view");
        }
        //guest
        if (!$is_guest && in_array($needle, ['login.view','login.create','register.view','register.create'])) {
            return redirect("login/success");
        }
    }
}
