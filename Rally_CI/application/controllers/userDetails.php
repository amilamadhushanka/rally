<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class UserDetails extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');			
		}


		public function update(){		

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('select_project','Name','required|xss_clean');
			

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_userDetails');			
			}
			else{
				//Successful validation

				$this->load->model('model_userDetails');

				$result=$this->model_editProject->sendMessage();
				
				if($result){
					echo "<script>alert(' Message sent successfully!')</script>";
					redirect('http://localhost/Rally_CI/projects', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_usernames(){
			$sql =$this->db->query("SELECT * from users");
			return $sql->result();
			
		}

		public function load_details($name){
			$sql =$this->db->query("SELECT * from users where username ="."'$name'");
			return $sql->result();
		}

		

		public function get_values($name){			
			$data['result']=$this->load_details($name);
			$this->load->view('view_userDetails',$data);
		}

		public function get_interface(){

			$unames['result'] = $this->load_usernames();
			$this->load->view('view_userDetails', $unames);
		}

	}

?>