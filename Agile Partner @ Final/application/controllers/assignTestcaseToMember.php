<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignTestcaseToMember extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();

		}

		public function index(){
			$this->load->view('view_assignTestcaseToMember');
		}

		public function assign(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('assignedTo','Assigned To','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_assignTestcaseToMember_1');
			}
			else{
				//Successful validation

				$this->load->model('model_assign_testcase_to_member');

				$result=$this->model_assign_testcase_to_member->assignToMember();

				if($result){
					echo "<script>alert('Assigned successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/assignTestcaseToMember', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
			
		}

		public function get_values($TC_id,$US_ID,$Iteration,$project){

			$this->load->view('view_assignTestcaseToMember_1',array('tc_id' => $TC_id,'us_id' => $US_ID,'iteration' => $Iteration,'project' => $project ));
		}

		
	}

?>


