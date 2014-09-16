<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AddUs_SelectProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('select_project','Project','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('addUs_selectProject_view');
			}
			else{
				//Successful validation

				$project=$this->input->post('select_project');

				if(isset($project)){
					$this->load->view('addUs_view', array('selected_project' =>$project )); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>