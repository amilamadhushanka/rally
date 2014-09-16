<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_login extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			
		}

		public function login_user(){

			$email=$this->input->post('txtEmail');
			$password=$this->input->post('txtPassword');

			$sql="SELECT * from users where username='{$email}' LIMIT 1";
			$result=$this->db->query($sql);
			$row=$result->row();

			if($result->num_rows() === 1){
				if($row->password === sha1($this->config->item('salt').$password)){
					session_start();
					$_SESSION['fName'] = $row->fName;
					$_SESSION['lName'] = $row->lName;
					$_SESSION['email'] = $row->username;
					$dateTime = date('m/d/Y h:i:s a', time());
          			$_SESSION['startTime'] = $dateTime;

					return 'logged_in';
				}
				else{
					return 'incorrect_password';
				}
			}
			else{
				return 'email_not_found';
			}
		}

		public function set_session($session_data){
			$sess_data=array('firstName' => $session_data['firstName'],
							 'lastName' => $session_data['lastName'],
							 'country' => $session_data['country'],
							 'email' => $session_data['email'],
							 'logged_in' => 1);

			$this->session->set_userdata($sess_data);
		}

		public function email_exists($email){
			$sql="SELECT fName,username from users where username='{$email}' LIMIT 1";
			$result=$this->db->query($sql);
			$row=$result->row();

			return ($result->num_rows() === 1 && $row->username) ? $row->fName : false;
		}

		public function verify_reset_password_code($email,$code){
			$sql="SELECT fName,username from users where username='{$email}' LIMIT 1";
			$result=$this->db->query($sql);
			$row=$result->row();

			if($result->num_rows() ===1){
				
				if($code == md5($this->config->item('salt').$row->fName)){
					//echo 'true';
					return true;
				}
				else{
					//echo 'false';
					return false;
				}

			}
			else{
				return false;
			}
		}

		public function update_password(){
			$email=$this->input->post('txtnEmail');
			$password=sha1($this->config->item('salt').$this->input->post('txtNewPassword'));

			$sql="UPDATE users SET password='{$password}' WHERE username='{$email}' LIMIT 1";
			$this->db->query($sql);

			if($this->db->affected_rows() === 1){
				return true;
			}
			else{
				return false;
			}
		}
	}

?>