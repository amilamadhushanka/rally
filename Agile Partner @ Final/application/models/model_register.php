<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_register extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			session_start();
		}

		public function insert_user(){
			$firstName=$this->input->post('txtFirstName');
			$lastName=$this->input->post('txtLastName');
			$email=$this->input->post('txtEmail');
			
			$password=sha1($this->config->item('salt').$this->input->post('txtPassword'));
			
			$phone=$this->input->post('txtPhone');
			$company=$this->input->post('txtCompany');
			$title=$this->input->post('listTitle');
			$country=$this->input->post('listCountry');

			$sql="insert into users (username,fName,lName,password,phone,company,title,country) 
				  values('".$email."',
				  		 ".$this->db->escape($firstName).",
				  		 ".$this->db->escape($lastName).",
				  		 '".$password."',
				  		 ".$this->db->escape($phone).",
				  		 ".$this->db->escape($company).",
				  		 ".$this->db->escape($title).",
				  		 ".$this->db->escape($country).")";

			$result=$this->db->query($sql);

			if($this->db->affected_rows()===1){

				//$this->set_session($firstName,$lastName,$country,$email);
				$_SESSION['fName'] = $firstName;
				$_SESSION['lName'] = $lastName;
				$_SESSION['email'] = $email;
				//print_r($this->session->all_userdata()); // for testing purposes
				$this->send_email();

				return $firstName;
			}
			else{
				return false;
			}

		}
		/*
		public function set_session($firstName,$lastName,$country,$email){
			
			$sess_data=array('firstName' => $firstName,
							 'lastName' => $lastName,
							 'country' => $country,
							 'email' => $email,
							 'logged_in' => 0);

			//$this->session->set_userdata($sess_data);
		}
		*/

		public function send_email(){

			$email=$_SESSION['email'];
			//$this->session->userdata('email');

			$this->load->library('email');
			$this->email->set_mailtype('html');

			$this->email->from('support@agilepartner.comxa.com','Agile Partner Team');
			$this->email->to($email);
			$this->email->subject('Welcome to Agile Partner');

			$message='<html>
                          <body bgcolor="#DCEEFC">
                            <center>
                              ===============================<br><br>
                              <b>Hi,</b> <br>
                              <b>Welcome to Agile Partner!</b> <br><br>
                              Sign in to get started:<br><br>
                              <font color="blue">User name: '.$email.'</font> <br>
                              Have fun!<br>
                              Agile Partner Product Team<br><br>
                              <a href="http://agilepartner.comxa.com/index.php/login">Sign In Now</a><br><br>
                              ===============================<br>
                            </center>
                          </body>
                        </html>';

			$this->email->message($message);

			$this->email->send();
		}

	}

?>
