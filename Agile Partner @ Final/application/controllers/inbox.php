<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Inbox extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}



		public function sendMessage(){
			

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('tos','To','required|xss_clean');
			$this->form_validation->set_rules('froms','From','required|xss_clean');
			
			

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_inbox');
				

				
			}
			else{
				//Successful validation

				$this->load->model('model_inbox');
				//$result=$this->model_inbox->getMessages();
				$you = $this->model_inbox->user1();
				$he = $this->model_inbox->user2();

				
				//$data['value'] = $this->$result;
				//$this->load->view('covertation',$you, $he );
				$this->load->view('convertation',array('you' =>$you ,'he' =>$he ));
				//$this->model_message->setMessages($you, $he);

				

				
				
			}
		}
		
		public function get_interface(){
			$this->load->view('view_inbox');


		}

		

	}

?>