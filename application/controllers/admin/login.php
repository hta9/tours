<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/login_model', 'login');
	}

	/**
	 * [index load registration view]
	 * @return [type] [description]
	 */
	public function index()
	{
		$data['admins'] = $this->login->get_all();
		$this->load->view('admin/login/index', $data);
	}

	/**
	 * [dashboard opens Navigation Menu]
	 * @return [type] [description]
	 */
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}

	/**
	 * [registration This function registers new admin with thier info]
	 * @return [boolean] [Inserted or not]
	 */
	public function register()
	{
		if ($this->input->post())
		{
			$firstname   = _post('firstname');
			$lastname    = _post('lastname');
			$username    = _post('username');
			$email       = _post('email');
			$password    = _post('password');
			$address     = _post('address');
			$country     = _post('country');
			$postal_code = _post('postal_code');
			$phone_no    = _post('phone_no');

			$numbers = range(0, 9);
			shuffle($numbers);

			for ($i = 0; $i < 6; $i++)
			{
				$nums[] = $numbers[$i];
			}

			$rand = implode('', $nums);

			$info_data = array

				(

				'firstname'   => $firstname,
				'lastname'    => $lastname,
				'username'    => $username,
				'email'       => $email,
				'password'    => md5($password),
				'phone_no'    => $phone_no,
				'postal_code' => $postal_code,
				'country'     => $country,
				'address'     => $address,
				'random_code' => $rand

			);

			$admins = $this->login->get_all();

			foreach ($admins as $admin)
			{
				$already_exist_users[] = $admin['email'];
			}

			if (in_array($email, $already_exist_users))
			{
				$message = "Sorry, This Email Id is Already Exist..!!";
				$this->session->set_flashdata('users', $message);
				redirect('admin/login/register');
			}
			else
			{
				$this->load->config('email');
				$this->load->library('email');

				//$this->session->set_userdata('code', $verify_code);

				$from    = $this->config->item('smtp_user');
				$to      = $email;
				$subject = "Hello".strstr(ucwords($email), '@', true)." Here is Your Verification Code.";

				$message = "Your Verification Code Is: <b>".$rand."</b>";

				$this->email->set_newline("\r\n");
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject($subject);

				$this->email->message($message);
				$this->email->set_mailtype("html");

				if ($this->email->send())
				{
					$sql = $this->login->insert($info_data);

					if ($sql)
					{
						redirect('admin/login/verify');
					}
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
		}
		else
		{
			$this->load->view('admin/login/registration');
		}
	}

	public function verify()
	{
		$this->login->limit(1, 0);
		$admin  = $this->login->order_by('id', 'desc')->get_all();
		$last_admin_data   = reset($admin);
		
		$verification_code = $last_admin_data['random_code'];

		if ($this->input->post())
		{
			$code = _post('code');

			if ($code == $verification_code)
			{
				redirect('admin/login/login');
			}
			else
			{
				echo "<b>Code Doesnt Matched.</b>";
				$this->load->view('admin/login/verify');
			}
		}
		else
		{
			$this->load->view('admin/login/verify');
		}
	}

	/**
	 * [login for cheking either user is logged in or not]
	 * @return [boolean] [true or false]
	 */
	public function login()
	{
		if ($this->input->post())
		{
			$email    = _post('email');
			$password = _post('password');

			$login_data = array

				(

				'email'    => $email,
				'password' => $password
			);

			$sql = $this->login->check_login($login_data);

			if ($sql)
			{
				$this->session->set_userdata('email', $email);
				$remembar = $this->input->post('remembar');

				if (isset($remembar))
				{
					$this->input->set_cookie('email', $login_data['email'], 86500);
					$this->input->set_cookie('password', $login_data['password'], 86500);
				}
				else
				{
					delete_cookie('email');
					delete_cookie('password');
				}

				redirect('admin/login/dashboard');
			}
			else
			{
				$login_err = "Invalid Id or Password.";
				$this->session->set_flashdata('login_err', $login_err);
				redirect('admin/login/login');
			}
		}
		else
		{
			$this->load->view('admin/login/login');
		}
	}

	/**
	 * [forgot_password here valid mail_id is entered on where you will reccieve mail ]
	 * @return [type] [description]
	 */
	public function forgot_password()
	{
		if ($this->input->post())
		{	
			$email = _post('email');

			$admins = $this->login->get_all();

			foreach ($admins as $admin)
			{
				$already_exist_users[] = $admin['email'];
			}

			if (!in_array($email, $already_exist_users))
			{

				redirect('admin/login/forgot_password');
			}

			$this->session->set_userdata('email', $email);

			$this->load->config('email');
			$this->load->library('email');

			$from    = $this->config->item('smtp_user');
			$to      = $email;
			$subject = "Hello".strstr(ucwords($email), '@', true)." Reset Your Password By Clicking This link Below.";

			$data          = array();
			$data['email'] = $email;

			$message = $this->load->view('admin/login/email_format', $data, true);

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->to($to);
			$this->email->subject($subject);

			$this->email->message($message);
			$this->email->set_mailtype("html");

			if ($this->email->send())
			{
				$msg = $this->session->set_flashdata('msg', 'Email is Successfully Sent..!!');
				redirect('admin/login/change_password');
			}
			else
			{
				show_error($this->email->print_debugger());
			}
		}
		else
		{
			$this->load->view('admin/login/forgot_password');
		}
	}

	/**
	 * [change_password Change password and set new password]
	 * @return [type] [description]
	 */
	public function change_password()
	{
		if ($this->input->post())
		{
			$email_data = $this->login->get_by('email', $this->session->userdata('email'));
			$id = $email_data['id'];
			
			$password = _post('password');

			$password_data = array(

				'password' => md5($password)
			);
			$this->session->userdata('email');

			$sql = $this->login->update($id,$password_data);


			if($sql)
			{
				redirect('admin/login/logout');
			}
			
		}
		else
		{
			$this->load->view('admin/login/change_password');
		}
	}

	/**
	 * [logout Navigate to Login Page]
	 * @return [type] [description]
	 */
	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect('admin/login/login');
	}

	/**
	 * [delete record  by id]
	 * @return [type] [description]
	 */
	public function delete($id)
	{
		$id  = base64_decode($id);
		$sql = $this->login->delete($id);

		if ($sql)
		{
			redirect('admin/login');
		}
	}

	/**
	 * [edit edit Username with Ajax]
	 * @return [type] [description]
	 */
	public function edit()
	{
		$id    = _post('id');
		$uname = _post('uname');
		

		$edit_data = array(

			'username' => $uname

		);

		$sql = $this->login->update($id, $edit_data);
	}

	/**
	 * [add_edit_bank_info if info is already added then it displayed for edit and if not then you can
	 * edit it from same form and data are  stored,addedd,updated in bank_details as per admin-id]
	 */
	public function add_edit_bank_info()
	{
		$email = $this->session->userdata('email');

		$admin_data = $this->login->get_by('email', $email);

		$admin_id = $admin_data['id'];

		if ($this->input->post())
		{
			$uri_id = $this->uri->segment(4);
			$id     = base64_decode($uri_id);

			if ($id != '')
			{
				$bank_name  = _post('bank_name');
				$acc_no     = _post('acc_no');
				$owner_name = _post('owner_name');
				$swift_code = _post('swift_code');

				$bank_details = array(

					'bank_name'  => $bank_name,
					'owner_name' => $owner_name,
					'acc_no'     => $acc_no,
					'swift_code' => $swift_code,
					'admin_id'   => $id
				);

				$this->login->update_bank_details($id, $bank_details);
				redirect('admin/login/dashboard');
			}
			else
			{
				$bank_name  = _post('bank_name');
				$acc_no     = _post('acc_no');
				$owner_name = _post('owner_name');
				$swift_code = _post('swift_code');

				$bank_details = array(

					'bank_name'  => $bank_name,
					'owner_name' => $owner_name,
					'acc_no'     => $acc_no,
					'swift_code' => $swift_code,
					'admin_id'   => $admin_id
				);

				$this->login->add_bank_details($bank_details);
				redirect('admin/login/dashboard');
			}
		}
		else
		{
			$data['bank_data'] = $this->login->get_bank_details($admin_id);

			$this->load->view('admin/profile/add_edit_bank_info', $data);
		}
	}

	/**
	 * [view_profile displays admin's All Information of Bank details and Registration details]
	 * @return [type] [description]
	 */
	public function view_profile()
	{
		$email              = $this->session->userdata('email');
		$data['admin_data'] = $this->login->get_by('email', $email);
		$admin_id           = $data['admin_data']['id'];
		$data['bank_data']  = $this->login->get_bank_details($admin_id);
		$this->load->view('admin/profile/view_profile', $data);
	}
}
