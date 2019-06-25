<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('email')==false)
		{
			redirect('admin/login/login');
		}
		

	}
}