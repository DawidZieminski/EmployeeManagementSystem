<?php
class Employee extends CI_Controller{
	public function index(){
	
	}
		public function createEmployee(){
		$this->load->model('Queries');
		$result = $this->Queries->getUserType();
		
		$this->load->view('createEmployee',['result'=>$result]);
	}

	public function insertEmployee(){
			    $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
			    $this->form_validation->set_rules('LastName', 'LastName', 'required');
			    $this->form_validation->set_rules('Email', 'Email', 'required');
                $this->form_validation->set_rules('Password', 'Password', 'required');
              #   $this->form_validation->set_rules('UserTypeID', 'UserTypeID', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
          
                if ($this->form_validation->run())
                {
                	$data = $this-> input->post();
                	print_r($data);
                	exit();
                	$this->load->model('Queries');
                	if($this->Queries->addEmployee($data)){
                		$this->session->set_flashdata('employee_add','Dodano pracownika do bazy danych ');

                	}
                	else{
				$this->session->set_flashdata('employee_add','Wystąpił błąd');
                	}
                	return redirect('dashboard');
                }
                else{
                	  $this->createEmployee();
                }
	}
}


?>