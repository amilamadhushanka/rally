<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class NewProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
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

				$this->load->model('Model_new_project');

				$result=$this->Model_new_project->create_project();

				if($result){
					echo "<script>alert('Project created successfully.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/newProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}


	}

?>