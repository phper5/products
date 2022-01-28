<?php

class Security
{
	protected $CI;
	public function checkForSecurity()
	{
		$this->CI =& get_instance();
		$this->CI ->load->helper('url');

	}
}
