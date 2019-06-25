<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_model extends My_Model
{
	protected $soft_delete = true;

	public function get_tours($tours = '')
	{
		$response = array();

		## Read value
		$draw            = $tours['draw'];
		$start           = $tours['start'];
		$rowperpage      = $tours['length']; // Rows display per page
		$columnIndex     = $tours['order'][0]['column']; // Column index
		$columnName      = $tours['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $tours['order'][0]['dir']; // asc or desc
		$searchValue     = $tours['search']['value'];
		
		// Search value

		## Search
		$searchQuery = "";

		if ($searchValue != '')
		{
			$searchQuery = " (drop_loc like '%".$searchValue."%' or title like '%".$searchValue."%' or price like '%".$searchValue."%' or pickup_loc like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records      = $this->db->get('tours')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');

		if ($searchValue != '')
		{
			$this->db->where($searchQuery);
		}

		$records               = $this->db->get('tours')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');

		if ($searchValue != '')
		{
			$this->db->where($searchQuery);
		}

		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);

		$records = $this->db->get('tours')->result();

		$data = array();

		foreach ($records as $record)
		{
			$data[] = array(
				"title"   => $record->title,
				"price"   => $record->price,
				"ratings" => $record->ratings
			);
		}

		## Response
		$response = array(
			"draw"                 => intval($draw),
			"iTotalRecords"        => $totalRecordwithFilter,
			"iTotalDisplayRecords" => $totalRecords,
			"aaData"               => $data
		);

		return $response;
	}
}
