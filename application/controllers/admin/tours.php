<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/tour_model', 'tour');
	}

	public function index()
	{
		//$data['tours'] = $this->tour->order_by('id','desc')->get_all();
		//$this->load->view('admin/tour/index', $data);
		$this->load->view('admin/tour/datatable');
	}

	/**
	 * [add Add Tour Details to tour table]
	 */
	public function add()
	{
		if ($this->input->post())
		{
			$title       = _post('title');
			$ratings     = _post('ratings');
			$price       = _post('price');
			$pickup_loc  = _post('pickup_loc');
			$drop_loc    = _post('drop_loc');
			$pickup_time = _post('pickup_time');
			$drop_time   = _post('drop_time');
			$pickup_date = _post('pickup_date');
			$drop_date   = _post('drop_date');
			$rates_per   = _post('rates_per');

			$tour_data = array(

				'title'       => $title,
				'ratings'     => $ratings,
				'price'       => $price,
				'pickup_loc'  => $pickup_loc,
				'drop_loc'    => $drop_loc,
				'pickup_date' => $pickup_date,
				'drop_date'   => $drop_date,
				'pickup_time' => $pickup_time,
				'drop_time'   => $drop_time,
				'rates_per'   => $rates_per

			);

			$this->tour->insert($tour_data);
			redirect('admin/tours');
		}
		else
		{
			$this->load->view('admin/tour/add');
		}
	}


	/**
	 * [delete delete records by id]
	 * @return [type] [description]
	 */
	public function delete()
	{	
		$id = _post('id');
		$id = base64_decode($id);
		$this->tour->delete($id);
		
	}

	/**
	 * [edit To edit Record By its ID]
	 * @param  [type] $id [description]
	 * @return [boolean]     [description]
	 */
	public function edit($id)
	{
		$id = base64_decode($id);

		if ($this->input->post())
		{
			$title       = _post('title');
			$ratings     = _post('ratings');
			$price       = _post('price');
			$pickup_loc  = _post('pickup_loc');
			$drop_loc    = _post('drop_loc');
			$pickup_time = _post('pickup_time');
			$drop_time   = _post('drop_time');
			$pickup_date = _post('pickup_date');
			$drop_date   = _post('drop_date');
			$rates_per   = _post('rates_per');

			$tour_data = array(

				'title'       => $title,
				'ratings'     => $ratings,
				'price'       => $price,
				'pickup_loc'  => $pickup_loc,
				'drop_loc'    => $drop_loc,
				'pickup_date' => $pickup_date,
				'drop_date'   => $drop_date,
				'pickup_time' => $pickup_time,
				'drop_time'   => $drop_time,
				'rates_per'   => $rates_per

			);

			$this->tour->update($id, $tour_data);
			redirect('admin/tours');
		}
		else
		{
			$data['tour'] = $this->tour->get_by('id', $id);

			$this->load->view('admin/tour/edit', $data);
		}
	}

	/**
	 * [delete_all delete records by ids]
	 * @return [type] [description]
	 */
	public function delete_all()
	{

		$ids = $this->input->post('checkbox_value');
		echo $len = count($ids);
		$this->tour->delete_many($ids);
	}

	/**
	 * [datatable description]
	 * @return [type] [description]
	 */
	public function datatable()
	{	

		$tours = $this->input->post();

		$tour_data = $this->tour->get_tours($tours);
        echo json_encode($tour_data);
	}



}
