<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Register extends CI_Controller{

		public function index(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtFirstName','First Name','required|xss_clean');
			$this->form_validation->set_rules('txtLastName','Last Name','required|xss_clean');
			$this->form_validation->set_rules('txtEmail','Email','trim|required|valid_email|is_unique[users.username]|xss_clean');
			$this->form_validation->set_rules('txtPassword','Password','trim|required|min_length[6]|max_length[20]|matches[txtConPassword]|xss_clean');
			$this->form_validation->set_rules('txtConPassword','Confirmed Password','trim|required|min_length[6]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('txtPhone', 'Phone', 'required|regex_match[/^[0-9().-]+$/]|xss_clean');
			$this->form_validation->set_rules('txtCompany','Company','required|xss_clean');
			$this->form_validation->set_rules('listTitle','Title','required');
			$this->form_validation->set_rules('listCountry','Country','required');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to register page and show errors.
				$this->load->view('view_register');
			}
			else{
				//Successful registration

				$this->load->model('model_register');

				$result=$this->model_register->insert_user();

				if($result){
					echo "<script>alert('Successfully Registered ! Email was sent to your email with your account details.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/login', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>