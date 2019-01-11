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
				#print_r( $query->row()->UserTypeID);
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

		public function searchRecord($query) {
			$this->db->select(['users.UserID', 'users.Email', 'users.FirstName', 'users.LastName', 'user_type.NameType','users.UserTypeID']);
			$this->db->from('users');
			$this->db->join('user_type', 'user_type.UserTypeID = users.UserTypeID');
			$this->db->like('FirstName',$query);
			$query = $this->db->get();
			return $query->result();
		}

		public function getEmployeeRecords($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('users');
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function insertEmpPersonalDetails($data){
			
			return $this->db->insert('employeedetails',$data);
		}

		public function getEmpPersonalDetails($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('employeedetails');
			if($query->num_rows()>0){
				return $query->row();
			}
		}
		
		public function insertEmpContactDetails($data){
			return $this->db->insert('employeecontact',$data);
		}

		public function getEmpContactDetails($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('employeecontact');
			if($query->num_rows()>0){
				return $query->row();
			}
		}
	}





	 
?>