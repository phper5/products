<?php

class Product_encrypt_library
{
    public function encode($string)
    {
        return base64_encode($string);
    }
    public function decode($string)
    {
        return base64_decode($string);
    }
}
