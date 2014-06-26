<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditUserstory extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function update(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('name','Name','required|xss_clean');
			//$this->form_validation->set_rules('txtTargetDate', 'Target Date', 'trim|valid_date[m/d/y,/]');
			//$this->form_validation->set_rules('userStory','User Story','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('editUserstory_view');
			}
			else{
				//Successful validation

				$this->load->model('editUserstory_model');

				$result=$this->editUserstory_model->update_userstory();

				if($result){
					echo "<script>alert('Userstory updated successfully!')</script>";
					redirect('http://localhost/Rally_CI/backlog/view_userStories', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_userstory($id){
			$sql =$this->db->query("SELECT * from userStory where ID ='$id'");
			return $sql->result();
		}

		public function get_values($id){
			$data['result']=$this->load_userstory($id);

			$this->load->view('editUserstory_view',$data);
		}
	}

?>