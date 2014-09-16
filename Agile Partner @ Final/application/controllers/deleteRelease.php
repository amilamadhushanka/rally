<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteRelease extends CI_Controller{

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
			$this->form_validation->set_rules('name','Release name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteRelease');
			}
			else{
				//Successful validation

				$this->load->model('model_delete_release');

				$result=$this->model_delete_release->delete_release();

				if($result){
					echo "<script>alert('Release removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_Release($name){
			$sql =$this->db->query("SELECT * from `release` where `name`='$name'");
			return $sql->result();
		}

		public function get_values($name){
			$data['result']=$this->load_Release($name);
			$this->load->view('view_header');
			$this->load->view('view_deleteRelease',$data);
		}
	}

?>