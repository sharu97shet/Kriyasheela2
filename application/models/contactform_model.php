<?php

class Contactform_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	//submit_index

	public function submit_index($data)
	{
		$query = $this->db->insert('tbl_contact', $data);
		if ($query) {

			return true;
		} else {
			return false;
		}
	}
}