<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ViewTask_selectProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('selectProject','project','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_viewTask_selectProject');

			}
			else{
				//Successful validation

				$project=$this->input->post('selectProject');
				
				//echo $team;

				if(isset($project)){

					$this->load->view('view_viewUnassignTask', array('selected_project' =>$project )); //passing values to view
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>