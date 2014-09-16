<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AddNewMemberToTeam extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);

		}

		public function load($team,$project){

			$this->load->view('view_addNewMemberToTeam',array('team' => $team,'project'=>$project ));
		}

		public function addNewMember($team,$project,$username){

			$this->load->model('model_editTeam');

			$result=$this->model_editTeam->addMember($team,$project,$username);

			if($result){
				echo "<script>alert('Team updated successfully!')</script>";
				redirect('http://agilepartner.comxa.com/index.php/editTeam_selectTeam', 'refresh');  
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
				
		}

		
	}

?>


