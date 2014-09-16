<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class MySettings extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function update(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtfName','First Name','required|xss_clean');
			$this->form_validation->set_rules('txtlName','Last Name','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_mySettings');
			}
			else{
				//Successful validation

				$this->load->model('model_my_settings');

				$result=$this->model_my_settings->update_user_info();

				if($result){
					echo "<script>alert('Account updated successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/home', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_accountInfo($name){
			$sql =$this->db->query("SELECT * from users where username ='$name'");
			return $sql->result();
		}

		public function get_values($username){
			$data['result']=$this->load_accountInfo($username);
			$this->load->view('view_header');
			$this->load->view('view_mySettings',$data);
		}
	}

?>