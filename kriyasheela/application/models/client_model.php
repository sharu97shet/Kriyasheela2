<?php

class client_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	public function insertClient($data)
	{
		$this->db->insert('tbl_clients', $data);
	}

	public function duplicatePan($data)
	{
		$query = $this->db->query("SELECT * FROM tbl_clients where PAN= '$data' ");

		return $query->result_array();

		//return true;
	}

	public function allClients()
	{
		$query = $this->db->query('SELECT * FROM tbl_clients');

		return $query->result_array();
	}

	function insert_csv($data)
	{

		$this->db->insert('tbl_clients', $data);

		//return $this->db->insert_id();
	}
}
