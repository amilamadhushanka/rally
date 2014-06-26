<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignedToIteration extends CI_Controller{

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
				$this->load->view('view_assignedToIteration');
			}
			else{
				//Successful validation

				$this->load->model('model_assignedToIteration');

				$result=$this->model_assignedToIteration->assignToIteration();

				if($result){
					echo "<script>alert('Assigned successfully!')</script>";
					redirect('http://localhost/Rally_CI/assignedToIteration_SelectProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

		public function get_values($id,$project){

			$this->load->view('view_assignedToIteration',array('defect_id' => $id, 'project' => $project ));
		}

	}

?>