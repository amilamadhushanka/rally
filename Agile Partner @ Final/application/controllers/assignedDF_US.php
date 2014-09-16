<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AssignedDF_US extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			//$this->load->view('view_assigndeDF_US');
		}

		public function remove($id){

			//check whether US or DF
			$num = explode("-",$id);

			if ($num[0]=='US') {

				$this->load->model('model_remove_us');
				$result=$this->model_remove_us->remove_userstory($id);

				if($result){
					echo "<script>alert('Userstory removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
			}
			else if ($num[0]=='DF') {

				$this->load->model('model_remove_df');
				$result=$this->model_remove_df->remove_defect($id);

				if($result){
					echo "<script>alert('Defect removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
			}

				
		}

		public function get_values($name){
			$data['iteration']=$name;
			$this->load->view('view_header');
			$this->load->view('view_assigndeDF_US',$data);
		}
	}

?>