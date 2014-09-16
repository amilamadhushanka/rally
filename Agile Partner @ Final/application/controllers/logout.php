<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Logout extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');

			session_start();
			
			unset($_SESSION['fName']);
        	unset($_SESSION['lName']);
        	unset($_SESSION['email']);
        	unset($_SESSION['startTime']);
        	unset($_SESSION['project']);
        	unset($_SESSION['teamRole']);

        	session_destroy();
		}

		public function index(){
   
    		//$this->session->sess_destroy();
    		redirect('http://agilepartner.comxa.com/index.php/login');
		}
	}
?>