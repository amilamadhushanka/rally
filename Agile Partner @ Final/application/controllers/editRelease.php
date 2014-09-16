<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditRelease extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function update(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('name','Name','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_editRelease');
			}
			else{
				//Successful validation

				$this->load->model('model_editRelease');

				$result=$this->model_editRelease->update_release();

				if($result){
					echo "<script>alert('Release updated successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_release($name){
			$sql =$this->db->query("SELECT * FROM `release` WHERE name ='$name'");
			return $sql->result();
		}

		public function get_values($name){
			$data['result']=$this->load_release($name);

			$this->load->view('view_header');
			$this->load->view('view_editRelease',$data);
		}
	}

?>