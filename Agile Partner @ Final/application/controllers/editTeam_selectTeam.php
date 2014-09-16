<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditTeam_selectTeam extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('select_team','team','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_editTeam_selectTeam');
			}
			else{
				//Successful validation

				$team=$this->input->post('select_team');
				$project=$this->input->post('project');
				//echo $team;

				if(isset($team)){
					$this->load->view('view_editTeam_userList', array('selected_team' =>$team ,'project'=>$project));
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>