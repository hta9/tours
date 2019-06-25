<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends My_Model {


	protected $soft_delete = true;
	protected $_table = 'admin';

	/**
	 * [check_login check login data with sql data]
	 * @return [boolean] [description]
	 */
	public function check_login($login_data)
	{
		$email  	= $login_data['email'];
		$password   = md5($login_data['password']);

		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$sql = $this->db->get('admin');
		
		if($sql->num_rows()==1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}

	/**
	 * [bank_details for fetch table name]
	 * @return [array] [description]
	 */
	public function get_bank_details($admin_id)
	{
		 $this->_table = "bank_details";
		 $result= $this->get_by('admin_id',$admin_id);

	 	 return $result;
	}

	/**
	 * [add_bank_details Fetch the table name of bank and insert bank_details with admin id]
	 */
	public function add_bank_details($bank_details)
	{
		
		 $this->_table = "bank_details";
		 $result= $this->insert($bank_details);
	 	 return $result;

	}

	/**
	 * [update_bank_details seprate function is made bcz here we have to check for field 'admin_id' not named only $id thats Why take table column's name seprate function is Made]
	 * @return [boolean] [true false]
	 */
	public function update_bank_details($id,$bank_details)
	{
		 $this->db->where('admin_id',$id);
		 $result= $this->db->update('bank_details',$bank_details);
		 return $result;
	}




}
