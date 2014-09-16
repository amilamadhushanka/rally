<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteIteration extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteIteration');
			}
			else{
				//Successful validation

				$this->load->model('model_delete_iteration');

				$check_result=$this->model_delete_iteration->check();

				if($check_result){

					$result=$this->model_delete_iteration->delete_iteration();

					if($result){
						//echo "<script>alert('Iteration deleted successfully!')</script>";
						redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
					}
					else{
						echo 'Sorry, there is a problem with the web site.';
					}
				}
				else{
					echo "<script>alert('Can not remove this iteration. It is assigned to user stories and defects. If you want to remove this first remove them from the selected iteration.')</script>";
					
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh');
				}
			}
		}

		public function load_iteration($name){
			$sql =$this->db->query("SELECT * from iteration where name ='$name'");
			return $sql->result();
		}

		public function get_values($name){
			$data['result']=$this->load_iteration($name);
			$this->load->view('view_header');
			$this->load->view('view_deleteIteration',$data);
		}
	}

?>