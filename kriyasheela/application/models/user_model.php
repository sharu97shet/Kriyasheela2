<?php

class user_model extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsers($data)
	{
		$this->db->insert('tbl_users', $data);
	}



	public function getAllUsersDetails()
	{
		$query = $this->db->query('SELECT * FROM tbl_users  inner join tbl_users_type on  tbl_users.user_type_id=tbl_users_type.user_type_id');

		return $query->result_array();
	}

	public function editUserData($userid)
	{
		$query = $this->db->query("SELECT * FROM tbl_users  where user_id=$userid");

		return $query->result_array();
	}



	public function getUserType($userid)
	{
		$query = $this->db->query("SELECT user_type_id FROM tbl_users  where user_id ='$userid'");

		return $query->result_array();
	}

	public function getUsersType($userid)
	{
		//$query = $this->db->query("SELECT * FROM tbl_users_type  where user_type_id =$userid" );

		$query = $this->db->query("SELECT * FROM tbl_users  inner join tbl_users_type on  tbl_users.user_type_id=tbl_users_type.user_type_id  where tbl_users.user_id =$userid");

		return $query->row('user_type_id');
	}


	public function getAllUserType()
	{
		$query = $this->db->query("SELECT * FROM tbl_users_type ");

		return $query->result_array();
	}

	public function getUsersTypeDetails($userid)
	{
		$query = $this->db->query("SELECT * FROM tbl_users_type  where user_type_id =$userid");

		return $query->result_array();
	}

	public function oldPasswordValidation($password)
	{
		$query = $this->db->query("SELECT * FROM tbl_users  where password= '$password' ");

		return $query->result_array();
	}

	public function updatePassword($pass, $data)
	{
		$this->db->set('password', $data);
		$this->db->where('user_id ', $pass);
		$this->db->update('tbl_users');
	}
}