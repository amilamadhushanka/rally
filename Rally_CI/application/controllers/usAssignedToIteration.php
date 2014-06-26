<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class UsAssignedToIteration extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function assign(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('iteration','Iteration','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('usAssignedToIteration_view');
			}
			else{
				//Successful validation

				$this->load->model('usAssignedToIteration_model');

				$result=$this->usAssignedToIteration_model->assignToIteration();

				if($result){
					echo "<script>alert('Assigned successfully!')</script>";
					redirect('http://localhost/Rally_CI/usAssignedToIteration_SelectProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

		public function get_values($id,$project){

			$this->load->view('usAssignedToIteration_view',array('ID' => $id, 'pname' => $project ));
		}

	}

?>