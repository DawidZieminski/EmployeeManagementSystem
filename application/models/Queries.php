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
	$query = $this->db->where(['UserID'=>$employee_id])->get('employeedetails');
			if($query->num_rows()>0){
				return $this->db->insert('employeedetails',$data);
			}else{
				return $this->db->update('employeedetails',$data);
			}
			
		}

		public function getEmpPersonalDetails($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('employeedetails');
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function insertEmpContactDetails($data){

			$query = $this->db->where(['UserID'=>$employee_id])->get('employeecontact');
			if($query->num_rows()>0){
				return $this->db->insert('employeecontact',$data);
			}else{
			return $this->db->update('employeecontact',$data);
		}
		}

		public function getEmpContactDetails($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('employeecontact');
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function deleteEmp($userid){
			 $this->db->delete('users', ['UserID'=>$userid]);
			 $this->db->delete('employeedetails', ['UserID'=>$userid]);
			 $this->db->delete('employeecontact', ['UserID'=>$userid]);
		}

		public function addWork($data){
	
			return $this->db->insert('work',$data);
		}

		public function getWorkRecords($employee_id){
			$query = $this->db->where(['UserID'=>$employee_id])->get('work');
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function getChartData($employee_id){
			$this->db->select(['work.UserID', 'work.Project', 'work.DateWork', 'work.Hours']);
			$this->db->from('work');
			$this->db->join('users', 'work.UserID = users.UserID');
			$this->db->where(['work.UserID'=>$employee_id]);
			$this->db->order_by('DateWork');
			$query = $this->db->get();
		
			return $query->result();

		}


		public function getChartData2($employee_id){
						$this->db->select(['work.UserID', 'work.Project', 'work.DateWork', 'SUM(work.Hours) as Hours']);
			$this->db->from('work');
			$this->db->join('users', 'work.UserID = users.UserID');
			$this->db->where(['work.UserID'=>$employee_id]);
			$this->db->group_by('DateWork');
			$this->db->order_by('DateWork');
			$query = $this->db->get();
		
			return $query->result();

		}

	

	
	}
?>