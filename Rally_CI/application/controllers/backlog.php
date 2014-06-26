<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Backlog extends CI_Controller{

		public function __construct(){
			parent::__construct();

			//$this->load->helper('url');
			//$this->load->helper('html');

		}

		public function index(){
			$this->load->view('view_us_df');
		}

		public function view_defects(){
			$this->load->view('view_defects');
		}

		public function view_userStories(){
			$this->load->view('view_userStories');
		}

	}

?>