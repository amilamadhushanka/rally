<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Backlog extends CI_Controller{

		public function __construct(){
			parent::__construct();

			//$this->load->helper('url');
			//$this->load->helper('html');

		}

		public function index(){
			$this->load->view('graph');
		}

	}

?>