<?php
	/**
		 * 
		 */
		class Login extends CI_Controller
		{
			public function index()
			{
                if($this->session->userdata('UserID')){
                    return redirect('dashboard');
                    } 
                    $this->load->view('login');
               
			}

			public function user_login()
			{
		        
			    $this->form_validation->set_rules('Email', 'Email', 'required');
                $this->form_validation->set_rules('Password', 'Password', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
          

                if ($this->form_validation->run())
                {
                     $Email= $this->input->post('Email');
                     $Password=$this->input->post('Password');
                     $this->load->model('Queries');
                     $UserID = $this->Queries->login_user($Email,$Password);
                     if($UserID)
                     {
                     	$this->session->set_userdata(['UserID'=>$UserID]);
                     	return redirect('dashboard');
                     }
                     else
                     {
                     	$this->session->set_flashdata('login_response','Invalid Email/Password');
                     	return redirect('login');
                     }
                }
                else
                {
                    $this->load->view('login');
                }
			}
            
                public function logout(){
                $this->session->unset_userdata('UserID');
                $this->load->view('login');
            }

     
	    }	
?>