<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditTeam_userList extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index(){
			$this->load->view('view_editTeam_userList');
		}

		public function remove($team,$username){
			$this->load->model('model_editTeam');

			$result=$this->model_editTeam->removeMember($team,$username);

			if($result){
				echo "<script>alert('Member removed successfully!')</script>";
				redirect('http://localhost/Rally_CI/editTeam_selectTeam', 'refresh');  
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

	}

?>