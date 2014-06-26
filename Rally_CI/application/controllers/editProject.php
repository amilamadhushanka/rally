<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}



		public function update(){
			

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('projectname','Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_editProject');
				

				
			}
			else{
				//Successful validation

				$this->load->model('model_editProject');

				$result=$this->model_editProject->update_project();
				

				if($result){
					echo "<script>alert(' updated successfully!')</script>";
					redirect('http://localhost/Rally_CI/projects', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_project($name){
			$sql =$this->db->query("SELECT * from project where name ='$name'");
			return $sql->result();
		}

		public function get_values($name){			
			$data['result']=$this->load_project($name);

			$this->load->view('view_editProject',$data);
		}

	}

?>