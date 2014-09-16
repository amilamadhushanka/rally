<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Projects extends CI_Controller{

		public function __construct(){
			parent::__construct();
			session_start();

		}

		public function index(){
			$this->load->view('view_settings_header');
			$this->load->view('view_projects');
		}

	}

?>