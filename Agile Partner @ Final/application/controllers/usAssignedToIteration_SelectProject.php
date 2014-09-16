<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class UsAssignedToIteration_SelectProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){

			$this->load->view('view_assignUserstoryToIteration'); 

		}

	}

?>