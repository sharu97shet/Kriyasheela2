<?php 


class worksheet_model extends CI_Model{

	 
	 public function __construct()
	{
		parent::__construct();  
		
	}

    public function insertWorkSheet($data)
	{
		$this->db->insert('tbl_worksheet',$data);
	}
	
	public	function getWorkOrder()
	{
		$query = $this->db->query('SELECT * FROM tbl_workorder');

		return $query->result_array();
	}

	public function getUsers()
	{
		$query = $this->db->query('SELECT * FROM tbl_users');

		return $query->result_array();
		
	}


	public function getWorkSheet($loginUserId)
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no  where user_id=$loginUserId");

		return $query->result_array();
		
	}

	public function worksheetIndividualDataForLoginUsers($balunand_id_no)
	{
		$query = $this->db->query("SELECT * FROM tbl_users  where balunand_id_no='$balunand_id_no' ");

		return $query->result_array();
		
	}

	public function worksheetIndividualData($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_worksheet  inner join tbl_workorder  on  tbl_worksheet.workorder_no=tbl_workorder.workorder_no
		
		where tbl_worksheet.workorder_no=$id");


		return $query->row();
		
	}
    

	public function getWorkOrderClientName($id)
	{
		$clientname=array();

		$ids=implode($id);  
		
		//if($query->num_rows()>1 )  foreach($query->num_rows()>1 as $row) 
			
	      $query = $this->db->query("SELECT client_name , partner_in_charge FROM tbl_workorder  where workorder_no= '$ids' ");

	   // $clientname['name']=$row['client_name'];
			
			  return $query->result_array();
		
	}

	public function getWorkSheetDetails($date , $starttime, $endtime ,$loginUserId)
	{
   
      $query = $this->db->query("SELECT * FROM `tbl_worksheet` WHERE date='$date ' and (start_time BETWEEN '$starttime' AND '$endtime' OR end_time BETWEEN '$starttime' AND '$endtime') and `user_id`=$loginUserId ");

        //$query = $this->db->query("SELECT * FROM `tbl_worksheet` WHERE date='2022-11-01' and (start_time BETWEEN '08:00' AND '09:00' OR end_time BETWEEN '08:00' AND '09:00') and `user_id`=2 ");

      //SELECT * FROM `tbl_worksheet` WHERE date='2022-11-01' AND (start_time BETWEEN '00:00:00' AND '09:30:00 am ' AND end_time BETWEEN '00:00:00' AND '01:40:00 pm ' ) and `user_id`=2

	
		 if($query->num_rows() > 0)  
           {  
                //return $query->row('workorder_no');var_dump($query->result_array()); true
               return   $query->row('worksheet_no');
           }  
           else  
           {  
                return 'no data';       
           }  
		
	}

	
			
		
	} 
	?>