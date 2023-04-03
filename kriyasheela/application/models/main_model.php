<?php
class Main_model extends CI_Model
{

     public   function can_login($balunand_id_no, $password)
     {
          $this->db->where('balunand_id_no', $balunand_id_no);
          $this->db->where('password', $password);
          $query = $this->db->get('tbl_users');

          // var_dump($query->row('balunand_id_no'));

          //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
          if ($query->num_rows() > 0) {
               //return true;
               return $query->row('user_id');
          } else {
               return false;
          }
     }


     public function getUsersType($userid)
     {
          //$query = $this->db->query("SELECT * FROM tbl_users_type  where user_type_id =$userid" );

          $query = $this->db->query("SELECT * FROM tbl_users  inner join tbl_users_type on  tbl_users.user_type_id=tbl_users_type.user_type_id  where tbl_users.user_id =$userid");

          return $query->row('user_type');
     }


     public function getUserType($user_id)
     {
          $query = $this->db->query("SELECT user_type FROM tbl_users_type where user_type_id= $user_id");

          return $query->row('user_type');
     }

     public function getUserName($user_id)
     {
          $query = $this->db->query("SELECT * FROM tbl_users where user_id=$user_id");
          //  $query = $this->db->get('tbl_users');  

          return $query->row('name');
     }


     public function countWorkorder()
     {
          $query = $this->db->query("SELECT COUNT(`workorder_no`) AS woirknumber FROM tbl_workorder ");


          return $query->row('woirknumber');
     }

     public function pendingWorkorder()
     {
          $query = $this->db->query("SELECT COUNT(`workorder_no`) AS woirknumber FROM tbl_workorder WHERE `status`='open' ");


          return $query->row('woirknumber');
     }

     public function pendingWorkorderDetails()
     {
          $query = $this->db->query("SELECT *  FROM tbl_workorder WHERE `status`='open' ");


          return $query->result_array();
     }



     public function countclients()
     {
          $query = $this->db->query("SELECT COUNT(`client_id`) AS workclientnumber FROM tbl_clients ");


          return $query->row('workclientnumber');
     }


     public function countusers()
     {
          $query = $this->db->query("SELECT COUNT(`user_id`) AS workusernumber FROM tbl_users ");


          return $query->row('workusernumber');
     }
}