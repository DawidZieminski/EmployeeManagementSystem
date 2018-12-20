<?php
	class Dashboard extends CI_Controller{
		public function index(){
			if(!$this->session->userdata('UserID')){
				return redirect('login');
			}
			else{
				$this->load->view('Dashboard');
			}
			
		}
	}
?>