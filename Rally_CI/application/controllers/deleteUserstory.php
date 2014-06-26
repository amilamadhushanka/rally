<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteUserstory extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('id','ID','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('deleteUserstory_view');
			}
			else{
				//Successful validation

				$this->load->model('deleteUserstory_model');

				$result=$this->deleteUserstory_model->delete_userstory();

				if($result){
					echo "<script>alert('Userstory removed successfully!')</script>";
					redirect('http://localhost/Rally_CI/backlog', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_Userstory($id){
			$sql =$this->db->query("SELECT * from userstory where ID ='$id'");
			return $sql->result();
		}

		public function get_values($id){
			$data['result']=$this->load_Userstory($id);

			$this->load->view('deleteUserstory_view',$data);
		}
	}

?>