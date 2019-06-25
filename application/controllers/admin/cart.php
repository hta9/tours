<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/cart_model', 'cart');
	}
}