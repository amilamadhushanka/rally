<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class NewProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index(){
			//$this->load->view('view_newProject');

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtProjectName','Project','required|is_unique[project.name]|xss_clean');


			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('view_newProject');
			}
			else{
				//Successful validation

				$this->load->model('model_newProject');

				$result=$this->model_newProject->create_project();

				if($result){
					echo "<script>alert('Project created successfully.')</script>";
					redirect('http://localhost/Rally_CI/newProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}


	}

?>