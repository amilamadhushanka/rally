<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditTestcase extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function update(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('iName','Iteration Name','required|xss_clean');
			$this->form_validation->set_rules('pname','Project Name','required|xss_clean');
			$this->form_validation->set_rules('uid','User story ID','required|xss_clean');
			$this->form_validation->set_rules('tcid','Testcase ID','required|xss_clean');
			$this->form_validation->set_rules('tcName','Testcase Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('editTestcase_view');
			}
			else{
				//Successful validation

				$this->load->model('editTestcase_model');

				$result=$this->editTestcase_model->update_testcase();

				if($result){
					echo "<script>alert('Testcase updated successfully!')</script>";
					redirect('http://localhost/Rally_CI/testCases', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_Testcase($iName,$uid,$tcid){
			$sql =$this->db->query("SELECT * from testcase where IterationName ='$iName' AND USid='$uid' AND TC_id='$tcid'");
			return $sql->result();
		}

		public function get_values($iName,$uid,$tcid){
			$data['result']=$this->load_Testcase($iName,$uid,$tcid);

			$this->load->view('editTestcase_view',$data);
		}
	}

?>