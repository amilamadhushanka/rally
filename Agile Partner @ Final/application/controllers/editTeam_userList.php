<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditTeam_userList extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){
			$this->load->view('view_editTeam_userList');
		}

		public function remove($team,$username){
			$this->load->model('model_edit_team');

			$result=$this->model_edit_team->removeMember($team,$username);

			if($result){
				echo "<script>alert('Member removed successfully!')</script>";
				redirect('http://agilepartner.comxa.com/index.php/editTeam_selectTeam', 'refresh');  
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

	}

?>