<?php



class Demo extends CI_Controller{
		public function __construct(){
			parent::__construct();

			//$this->load->helper('url');
			//$this->load->helper('html');
			session_start();
		}

		public function index(){
			
			$this->load->library('form_validation');

      $this->load->view('view_files');
			
		}

		public function fupload(){
     
      $this->load->model('model_files');
      $result=$this->model_files->fupload();
      if ($result) {    
       $this->load->view('view_files');    

      }
    }


}


?>