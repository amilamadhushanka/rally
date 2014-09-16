<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateNewTeam extends CI_Controller {

	public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}
	public function index(){
			//$this->load->view('view_newProject');

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('team', 'Project', 'required|xss_clean');

			if($this->form_validation->run()==FALSE)
			{
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('new_team');
				
			}

			else
			{
				//Successful validation

				//$this->load->model('model_team');

				//$result=$this->model_team->insert_user();

				//if($result)
				//{
					//echo "<script>alert('Team created successfully.')</script>";
					//redirect('http://localhost/Rally_CI/createNewTeam', 'refresh'); 
					$team=$this->input->post('team');
					$project=$this->input->post('project');
					$this->load->view('view_addMembersToTeam',array('team' => $team,'project'=>$project ));
				//}

				//else
				//{
				//	echo 'Sorry, there is a problem with the web site.';
				//}
				
			}
		}


	}

?>









