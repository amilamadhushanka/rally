<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteTask extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master'&&$_SESSION['permission']!='delete'&&$_SESSION['permission']!='edit/delete') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('task','Task Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteTask');
			}
			else{
				//Successful validation

				$this->load->model('model_delete_task');

				$result=$this->model_delete_task->delete_task();

				if($result){
					//echo "<script>alert('Defect removed successfully!')</script>";
					echo "<script>alert('Task deleted!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/tasks', 'refresh');  
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
			$this->load->view('view_header');
			$this->load->view('view_deleteTask',$data);
		}
	}

?>


	