<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AddDefect extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');
			//$this->MY_Form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_addDefect');
			}
			else{
				//Successful validation

				$this->load->model('model_add_defect');

				$result=$this->model_add_defect->add_defect();

				if($result){
					echo "<script>alert('Defect created successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/addDefect', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

	}

?>