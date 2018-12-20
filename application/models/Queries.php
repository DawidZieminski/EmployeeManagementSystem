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
	}
?>