<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Projects extends CI_Controller{

		public function __construct(){
			parent::__construct();

		}

		public function index(){
			$this->load->view('view_projects');
		}

	}

?>