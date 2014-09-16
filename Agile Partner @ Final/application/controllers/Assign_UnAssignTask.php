<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Assign_UnAssignTask extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('task','Task Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_Assign_UnAssignTask');
			}
			else{
				//Successful validation

				$this->load->model('model_assign_unassign_task');

				$result=$this->model_assign_unassign_task->update_task();

				if($result){
					echo "<script>alert('Task updated successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/viewTask_selectProject', 'refresh');  
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}

		}

		public function load_task($Task){
			$sql =$this->db->query("SELECT * from newtask where task_name ='$Task'");
			return $sql->result();
			

		}

		public function get_values($Task){

			$data['arr']=$this->load_task($Task);

			$this->load->view('view_Assign_UnAssignTask',$data);
		}
	}

?>


