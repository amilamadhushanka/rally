<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AllImages extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			//if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){
			$this->load->view('view_settings_header');
			$this->load->view('view_AllImages');
		}

	}

?>