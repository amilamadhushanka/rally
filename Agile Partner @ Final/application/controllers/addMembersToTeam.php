<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AddMembersToTeam extends CI_Controller{

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

		public function addMember($team,$project,$username){

			$this->load->view('view_addMembersToTeam_1',array('team' => $team,'project'=>$project,'username'=>$username));  
				
		}

		
	}

?>


