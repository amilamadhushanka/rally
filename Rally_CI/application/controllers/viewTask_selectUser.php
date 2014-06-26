<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ViewTask_selectUser extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function index(){
			
			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('select_user','user','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_viewTask_selectUser');
				
			}
			else{
				//Successful validation

				$user=$this->input->post('select_user');
				
				//echo $team;

				if(isset($user)){

					$this->load->view('view_viewTask', array('selected_user' =>$user )); //passing values to view
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>