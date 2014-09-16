<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class UserPermission extends CI_Controller{

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
			$this->form_validation->set_rules('txtTeam','Team','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create select project page and show errors.
				$this->load->view('view_userPermission');
			}
			else{
				//Successful validation
				$this->load->model('model_user_permission');

				$result=$this->model_user_permission->update();

				if($result){
					echo "<script>alert('User permission changed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/createTeam', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}				
			}
		}

		public function load_details($user){
			$team=$_SESSION['team'];
			$sql =$this->db->query("SELECT distinct u.fName,u.lName,u.title,u.phone,u.username,u.title,t.permission,t.role FROM users u, newteam t WHERE u.username=t.userName AND teamId='$team' AND t.userName='$user'");
			return $sql->result();
		}

		public function get_values($user){
			$data['result']=$this->load_details($user);

			$this->load->view('view_header');
			$this->load->view('view_userPermission',$data);
		}

	}

?>