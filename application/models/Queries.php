<?php
	/**
	 * 
	 */
	class Queries extends CI_Model
	{
		public function login_user($Email,$Password){
			$query = $this->db->where(['Email'=>$Email,'Password'=>$Password])->get('users');
			if($query->num_rows() >0){
				return $query->row()->UserID;
			}
		}

		public function  getUserType(){
				$query = $this->db->where(['NameType'=>'Employee'])->get('user_type');
			if($query->num_rows() >0){
				print_r( $query->row()->UserTypeID);
				#return $query->row()->UserTypeID;
			}
		}
		public function addEmployee($data){
			return $this->db->insert('users',$data);

		}
	}
?>