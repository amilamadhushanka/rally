<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Home extends CI_Controller{

		private $logged_in;

		public function __construct(){
			parent::__construct();

			if($this->session->userdata('logged_in')){
				$this->logged_in=true;
			}
			else{
				$this->logged_in=false;
			}

			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index(){
			$this->load->view('view_home',array('logged_in'=>$this->logged_in));
		}

	}

?>