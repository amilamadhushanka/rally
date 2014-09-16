<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class CreateIteration extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){
			//$this->load->view('view_createIteration');

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('project','Project','required|xss_clean');
			$this->form_validation->set_rules('txtName','Name','required|is_unique[iteration.name]|xss_clean');
			//$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|callback__alpha_dash_space');
			//$rules['txtName']  = "required|callback__alpha_dash_space";
			//$this->form_validation->set_rules($rules);

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('view_createIteration');
			}
			else{
				//Successful validation

				$this->load->model('model_create_iteration');

				$result=$this->model_create_iteration->create_iteration();

				if($result){
					echo "<script>alert('Iteration created successfully.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/createIteration', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}


	}

?>