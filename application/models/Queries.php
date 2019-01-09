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
				return $query->row()->UserTypeID;
			}
		}


		public function addEmployee($data){
			return $this->db->insert('users',$data);
		}

		#Wyswietlenie wszystkich pracowników
		public function getAllUsers($limit, $offset){
			$this->db->select(['users.UserID', 'users.Email', 'users.FirstName', 'users.LastName', 'user_type.NameType','users.UserTypeID']);
			$this->db->from('users');
			$this->db->join('user_type', 'user_type.UserTypeID = users.UserTypeID');
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			return $query->result();
		}

		public function get_num_rows(){
			$query = $this->db->get('users');
			return $query->num_rows();
		}



	}  
?>