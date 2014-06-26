<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignedUS extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
		}

		public function index(){
			
		}

		public function remove($id){
			$this->load->model('removeUS_model');

			$result=$this->removeUS_model->remove_userstory($id);

				if($result){
					echo "<script>alert('Defect removed successfully!')</script>";
					redirect('http://localhost/Rally_CI/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
		}

		public function get_values($name){
			$data['iteration']=$name;

			$this->load->view('assignedUS_view',$data);
		}
	}

?>