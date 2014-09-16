<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteTestcase extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master'&&$_SESSION['permission']!='delete'&&$_SESSION['permission']!='edit/delete') exit('access denied for user '.$_SESSION['email']);
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('tcid','Testcase ID','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteTestcase');
			}
			else{
				//Successful validation

				$this->load->model('delete_testcase_model');

				$result=$this->delete_testcase_model->delete_testcase();

				if($result){
					//echo "<script>alert('Testcase removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/testCases', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_Testcase($tcid){
			$sql =$this->db->query("SELECT * from testcase where TC_id='$tcid'");
			return $sql->result();
		}

		public function get_values($tcid){
			$data['result']=$this->load_Testcase($tcid);
			$this->load->view('view_header');
			$this->load->view('view_deleteTestcase',$data);
		}
	}

?>