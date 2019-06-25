<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends My_Controller
{
	function __construct()
	{
		parent::__construct();
	 $this->load->model('admin/tour_model', 'tour');
	}

	public function add_item()
	{
		if($this->input->post())
		{
		
			echo $id = base64_decode(_post('id'));
			$data = $this->tour->get_by('id',$id);
			print_r($data);
			$this->cart->insert($data);

		}

		 $data['cartItems'] = $this->cart->contents();
		 var_dump($data);

	}
}