<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}



		public function update(){
			

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('projectname','Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_settings_header');
				$this->load->view('view_editProject');
				

				
			}
			else{
				//Successful validation

				$this->load->model('model_edit_project');

				$result=$this->model_edit_project->update_project();
				

				if($result){
					echo "<script>alert(' updated successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/projects', 'refresh'); 
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

			$this->load->view('view_settings_header');
			$this->load->view('view_editProject',$data);
		}

	}

?>