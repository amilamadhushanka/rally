<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignedToRelease extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function assign(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('release','Release','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_assignedToRelease');
			}
			else{
				//Successful validation

				$this->load->model('model_assigned_to_release');

				$result=$this->model_assigned_to_release->assignToIteration();

				if($result){
					echo "<script>alert('Assigned successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/assignedToRelease_SelectProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

		public function get_values($id,$project){

			$this->load->view('view_assignedToRelease',array('iteration' => $id, 'project' => $project ));
		}

	}

?>