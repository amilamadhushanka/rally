<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Reports extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			
			$this->load->library('form_validation');
			//set rules
			$this->form_validation->set_rules('selected_project','Project','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_header');
				$this->load->view('view_reportsMain');
			}
			else{
				//Successful validation

				$project=$this->input->post('selected_project');
				$status=$this->input->post('selected_status');

				if(isset($project)){
					$this->load->view('view_reports_defects', array('selected_project' =>$project ,'selected_status'=>$status)); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>