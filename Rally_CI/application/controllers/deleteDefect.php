<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteDefect extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteDefect');
			}
			else{
				//Successful validation

				$this->load->model('model_deleteDefect');

				$check_result=$this->model_deleteDefect->check();

				if($check_result){

					$result=$this->model_deleteDefect->delete_defect();

					if($result){
						//echo "<script>alert('Defect removed successfully!')</script>";
						redirect('http://localhost/Rally_CI/backlog/view_defects', 'refresh'); 
					}
					else{
						echo 'Sorry, there is a problem with the web site.';
					}
				}
				else{
					echo "<script>alert('Can not remove this defect. It is assigned to a iteration. If you want to remove this first remove it from the assigned iteration.')</script>";
					
					redirect('http://localhost/Rally_CI/backlog/view_defects', 'refresh');
				}
				
			}
		}

		public function load_defect($id){
			$sql =$this->db->query("SELECT * from defect where id ='$id'");
			return $sql->result();
		}

		public function get_values($id){
			$data['result']=$this->load_defect($id);

			$this->load->view('view_deleteDefect',$data);
		}
	}

?>