<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Teamload extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			$this->load->model('model_teamload');
			$data = $this->model_teamload->load($_SESSION['project']);
					
			$this->load->view('view_teamload', array( 'dataset' => $data)); 
		}


		public function loadTeamLoad(){	
			$this->load->model('model_teamload');
		}

	}

?>