<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class UsAssignedToIteration extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function assign(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('iteration','Iteration','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_usAssignedToIteration');
			}
			else{
				//Successful validation

				$this->load->model('model_us_assigned_to_iteration');

				$result=$this->model_us_assigned_to_iteration->assignToIteration();

				if($result){
					echo "<script>alert('Assigned successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/usAssignedToIteration_SelectProject', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

		public function get_values($id,$project){

			$this->load->view('view_usAssignedToIteration',array('ID' => $id, 'pname' => $project ));
		}

	}

?>