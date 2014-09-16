<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignedUS extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			
		}

		public function remove($id){
			$this->load->model('model_removeIteration');

			$result=$this->model_removeIteration->remove_iteration($id);

				if($result){
					echo "<script>alert('Defect removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
		}

		public function get_values($name){
			$data['release']=$name;

			$this->load->view('assignedIteration_view',$data);
		}
	}

?>