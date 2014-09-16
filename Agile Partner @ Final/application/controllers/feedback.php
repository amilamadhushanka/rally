<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Feedback extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}



		public function index(){
			

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('feedbackfor','Use','required|xss_clean');
			$this->form_validation->set_rules('txtfeedback','Feed','required|xss_clean');
			
			

			if(!$this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_feedback');

				

				
			}
			else{
				//Successful validation

				$this->load->model('model_feedback');
				$result=$this->model_feedback->sendFeedback();
				

				if($result){
					echo "<script>alert(' sent successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/feedbackselection', 'refresh'); 
				}
				else{
					echo "<script>alert(' Sending Failed!')</script>";
					///redirect('http://localhost/Rally_CI/feedback', 'refresh');
				}
				
			}
		}
		

	

	}

?>