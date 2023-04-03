<?php

class Workorder_model extends CI_Model
{

	function insertuser($data)
	{
		$this->db->insert('tbl_workorder', $data);
	}

	function fetch_data()
	{

		$this->db->select('*');

		$this->db->from('tbl_worksheet');

		$query = $this->db->get();

		return $query->result_array();
	}


	public  function fetchworkordersheetdata($workid)
	{

		$query = $this->db->query("SELECT * FROM tbl_worksheet where workorder_no='$workid' ");

		//$query = $this->db->get();

		return $query->result_array();
	}

	function getWorkorder()
	{
		$query = $this->db->query('SELECT * FROM tbl_workorder');

		$query = $this->db->get('tbl_workorder');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}


	public  function getOneWorkOrder($data)
	{
		$query = $this->db->query("SELECT * ,b.type_of_work FROM tbl_workorder a inner join tbl_typeofwork b on b.type_of_work_id=a.type_of_work  where workorder_no='$data'");

		return $query->result_array();
	}

	public  function getWorkOrderNo()
	{

		$query = $this->db->query("SELECT * FROM tbl_workorder ");

		return $query->result_array();
	}

	//assign to part 
	public  function getAssignToWorkOrderNo()
	{
		$query = $this->db->query("SELECT * ,b.type_of_work FROM tbl_workorder a inner join tbl_typeofwork b on b.type_of_work_id=a.type_of_work  ");

		return $query->result_array();
	}

	public function getAssignToUsers($userid)
	{

		$query = $this->db->query("SELECT name, user_id, balunand_id_no,student_reg_no FROM tbl_users where user_id = $userid ");
		// var_dump( $query );
		return $query->result_array();
	}

	public function getAssignToUsers1($userid)
	{

		$query = $this->db->query("SELECT name ,user_id,balunand_id_no,student_reg_no FROM tbl_users where user_id = $userid   ");
		// var_dump( $query );
		return $query->result_array();
	}

	public  function getUserDetails()
	{
		$query = $this->db->query('SELECT * FROM tbl_users');


		return $query->result_array();
	}


	function fetch_workorder_data()
	{
		//$this->db->select("CONCAT_WS(' ', users.first_name, users.last_name) AS name");
		$query = $this->db->query('SELECT workorder_no  FROM tbl_workorder ORDER BY workorder_no DESC LIMIT 1');
		//var_dump($query );


		return $query->result_array();
	}

	public function getUsers()
	{

		$query = $this->db->query('SELECT name ,user_id FROM tbl_users ');

		return $query->result_array();
	}

	public function getWorkOrderClientName($id)
	{
		$clientname = array();

		$ids = implode($id);

		//if($query->num_rows()>1 )  foreach($query->num_rows()>1 as $row) 

		$query = $this->db->query("SELECT assign_to FROM tbl_workorder  where workorder_no= $ids");

		// $clientname['name']=$row['client_name'];

		return $query->result_array();
	}

	public function getClientName()
	{
		$query = $this->db->query('SELECT * FROM tbl_clients');

		return $query->result_array();
	}




	public function getTypeofWork()
	{
		$query = $this->db->query('SELECT * FROM tbl_typeofwork');

		return $query->result_array();
	}

	public function getTypeofWorkPrefix($type_of_work_id)
	{
		$query = $this->db->query("SELECT prefix FROM tbl_typeofwork where type_of_work_id = $type_of_work_id   ");

		//return $query->result_array();
		return $query->row('prefix');
	}
}
