<?php

function product_currency_rate()
{
    $url = 'http://api.exchangeratesapi.io/v1/latest?access_key=1ed2a90998ef8be62359a03ab54d4b75&symbols=USD,RON';
    $data = file_get_contents($url);
    $data = json_decode($data, true);
    return $data['rates'];
}
