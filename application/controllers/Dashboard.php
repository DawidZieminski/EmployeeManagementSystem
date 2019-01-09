<?php
	class Dashboard extends CI_Controller{
		public function index(){
			if(!$this->session->userdata('UserID')){
				return redirect('login');
			}
			else{
				$this->load->model('Queries');

				$this->load->library('pagination');
				$config = [
					'base_url' => base_url("dashboard/index"),
					'per_page' => 5,
					'total_rows' => $this->Queries->get_num_rows(),
					
				];

				$this->pagination->initialize($config);

				$result = $this->Queries->getAllUsers($config['per_page'], $this->uri->segment(3));
				$this->load->view('Dashboard', ['result'=>$result]);
			}
			
		}
	}
?> 