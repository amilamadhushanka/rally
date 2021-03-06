<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Login extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('model_login');

			$this->load->helper('url');
			$this->load->helper('html');
			
		}

		public function index(){
			$this->load->view('view_login');
		}		

		public function login_user(){

			$this->load->library('form_validation');

			$this->form_validation->set_rules('txtEmail','Email','trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('txtPassword','Password','trim|required|min_length[6]|max_length[20]');	
			
			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to login page and show errors.
				$this->load->view('view_login');
			}
			else{
				//Successful login
				$entered_email=$this->input->post('txtEmail');

				$result=$this->model_login->login_user();

				switch($result){
					case 'logged_in':
						//authentication completed. send to logged in home page.

						//get projects
						$query = $this->db->query("SELECT DISTINCT projectName FROM newteam WHERE userName='$entered_email'");
						$data['projects'] = $query->result_array();

						$query = $this->db->query("SELECT count(projectName) as cnt FROM newteam WHERE userName='$entered_email'");
						$data['projectCount'] = $query->result_array();

						//$this->load->view('view_header');
						//$this->load->view('view_home');
						$this->load->view('view_homeSelectProject',$data);
						
						break;
					case 'incorrect_password':
						echo "<script>alert('The email or password you entered is incorrect.')</script>";
						$this->load->view('view_login');
						break;
					case 'email_not_found':
						echo "<script>alert('The email or password you entered is incorrect.')</script>";
						$this->load->view('view_login');
						break;

				}
			}
		}

		public function reset_password(){
			
			if(isset($_POST['txtrEmail'])&& !empty($_POST['txtrEmail'])){
				
				$this->load->library('form_validation');

				$this->form_validation->set_rules('txtrEmail','Email','trim|required|valid_email|xss_clean');

				if($this->form_validation->run()==FALSE){
					//email didn't validate. Send back to reset password page and show errors.
					$this->load->view('view_fogotPassword', array('error' => 'Please supply a valid email address.' ));
				}
				else{
					$email=trim($this->input->post('txtrEmail'));
					$result=$this->model_login->email_exists($email);

					if($result){
						//if the email found, $result is now their firstname
						$this->send_reset_password_email($email,$result);
						$this->load->view('view_resetPasswordSendSuccess', array('email' =>$email ));
					}
					else{
						$this->load->view('view_fogotPassword', array('error' =>'Email address not registered !' ));
					}
				}
			}
			else{
				$this->load->view('view_fogotPassword');
			}
		}

		private function send_reset_password_email($email,$firstname){

			$this->load->library('email');
			$this->email->set_mailtype('html');

			$email_code=md5($this->config->item('salt').$firstname);

			$this->email->from('support@agilepartner.comxa.com','Agile Partner Team');
			$this->email->to($email);
			$this->email->subject('Please reset your password at Agile Partner');

			$message='<html>
                          <body bgcolor="#DCEEFC">
                            <center>
                              ===============================<br><br>
                              <b>Dear, '.$firstname.'</b> <br>
                              <br>
                              Please reset your password to get started:<br><br>
                              <p>Please <strong><a href="http://agilepartner.comxa.com/index.php/login/reset_password_form/'. $email. '/'.$email_code.'">click here</a></strong>
                              to reset your password.</p>
                              <p>Thank you!</p>
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

		public function reset_password_form($email,$email_code){
			if(isset($email,$email_code)){
				$email=trim($email);
				$email_hash=sha1($email.$email_code);
				$verified=$this->model_login->verify_reset_password_code($email,$email_code);

				if($verified){
					$this->load->view('view_resetPassword',array('email_hash' => $email_hash, 'email_code'=>$email_code, 'email'=>$email ));
				}
				else{
					$this->load->view('view_fogotPassword',array('error' => 'There was a problem with the link. Please click it again or request to 
						reset your password again.', 'email'=>$email));
				}
			}
		}

		public function update_password(){
			//if(!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'].$_POST['email_code'])){
			//	die('Error updating your password!');
			//}
			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('email_hash','Email Hash','trim|required');
			$this->form_validation->set_rules('txtnEmail','Email','trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('txtNewPassword','Password','trim|required|min_length[6]|max_length[20]|matches[txtComfirmPassword]|xss_clean');
			$this->form_validation->set_rules('txtComfirmPassword','Confirm Password','trim|required|min_length[6]|max_length[20]|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to update password and show errors.
				$this->load->view('view_resetPassword');
			}
			else{
				//successfull update
				$result=$this->model_login->update_password();

				if($result){
					$this->load->view('view_login');
					echo "<script>alert('Password changed successfully!')</script>";
				}
				else{
					$this->load->view('view_resetPassword', array('error' => 'Problem updating your password.'));
				}
			}			

		}



	}

?>