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
			    $this->form_validation->set_rules('Email', 'Email', 'required|valid_email|is_unique[users.Email]');
                $this->form_validation->set_rules('Password', 'Password', 'required|min_length[6]');
                $this->form_validation->set_rules('UserTypeID', 'UserTypeID', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
          
                if ($this->form_validation->run())
                {
                	$data = $this->input->post();
                	#print_r($data);
                	#exit();
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

	public function empPersonalDetails($employee_id){
		$this->load->model('Queries');
		$result = $this->Queries->getEmployeeRecords($employee_id);
		$records = $this->Queries->getEmpPersonalDetails($employee_id);
		$this->load->view('empPersonalDetails',['result'=>$result, 'records'=>$records]);

	}

	public function addPersonalDetails($employee_id){
		    	

		    	$this->form_validation->set_rules('FirstName', 'FirstName', 'required');
			    $this->form_validation->set_rules('LastName', 'LastName', 'required');
                $this->form_validation->set_rules('DOB', 'DOB', 'required');
                $this->form_validation->set_rules('Salary', 'Salary', 'required');
                $this->form_validation->set_rules('AccountNumber', 'AccountNumber', 'required');
                $this->form_validation->set_rules('Bonus', 'Bonus', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

                 if ($this->form_validation->run())
                {
                	 $data = $this->input->post();
                	 echo print_r($data);
                	 $this->load->model('Queries');
                	 if($this->Queries->insertEmpPersonalDetails($data)){
                	 	$this->session->set_flashdata('employee_add','Zaktualizowano dane pracownika');
                	 }else
                	 {
                	 	$this->session->set_flashdata('employee_add','Błąd sesji');
                	 }
                	 return redirect('dashboard');
                }
                else{

                	 $this->empPersonalDetails($employee_id);
                }
	}

	public function empContactDetails($employee_id){
		$this->load->model('Queries');
		$result = $this->Queries->getEmployeeRecords($employee_id);
		$records = $this->Queries->getEmpContactDetails($employee_id);
		$this->load->view('empContactDetails',['result'=>$result, 'records'=>$records]);
	}

	public function addContactlDetails($employee_id){
				$this->form_validation->set_rules('Adress1', 'Adress1', 'required');
                $this->form_validation->set_rules('City', 'City', 'required');
                $this->form_validation->set_rules('State', 'State', 'required');
                $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
                $this->form_validation->set_rules('Country', 'Country', 'required');
                $this->form_validation->set_rules('Mobile', 'Mobile', 'required');  
                $this->form_validation->set_rules('Email', 'Email', 'required');              
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
          
                if ($this->form_validation->run())
                {
                	$data = $this->input->post();
                	$this->load->model('Queries');
                	if($this->Queries->insertEmpContactDetails($data)){
                			$this->session->set_flashdata('employee_add','Poprawnie zaktualizowano dane kontaktowe');

                	}
                	else{
						$this->session->set_flashdata('employee_add','Wystąpił błąd');
                	}
                	return redirect('dashboard');
                }
                else{
                	  $this->empContactDetails($employee_id);
                }
	}



}
?>