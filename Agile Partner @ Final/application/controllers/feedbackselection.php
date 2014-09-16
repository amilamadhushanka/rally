<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Feedbackselection extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('selectType','type','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_feedbackselection');

			}
			else{
				//Successful validation

				$types=$this->input->post('selectType');
				
			

				if(isset($types)){

					$this->load->view('view_feedback', array( 'type' => $types)); //passing values to view
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>