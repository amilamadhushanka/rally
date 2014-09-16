<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Message extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}



		public function sendMessage(){
			

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('to','To','required|xss_clean');
			$this->form_validation->set_rules('from','From','required|xss_clean');
			$this->form_validation->set_rules('txtmessage','Message','required|xss_clean');
			

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_message');
				

				
			}
			else{
				//Successful validation

				$this->load->model('model_message');
				$result=$this->model_message->sendMessage();
				

				if($result){
					echo "<script>alert(' sent successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/message', 'refresh'); 
				}
				else{
					echo "<script>alert(' Sending Failed!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/message', 'refresh');
				}
				
			}
		}
		

		public function index(){			
			
			$this->load->view('view_message');
		}

	}

?>