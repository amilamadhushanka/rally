<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteTestcase extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('tcid','Testcase ID','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('deleteTestcase_view');
			}
			else{
				//Successful validation

				$this->load->model('deleteTestcase_model');

				$result=$this->deleteTestcase_model->delete_testcase();

				if($result){
					//echo "<script>alert('Testcase removed successfully!')</script>";
					redirect('http://localhost/Rally_CI/testCases', 'refresh'); 
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

			$this->load->view('deleteTestcase_view',$data);
		}
	}

?>