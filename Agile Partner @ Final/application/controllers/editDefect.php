<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class EditDefect extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master'&&$_SESSION['permission']!='edit'&&$_SESSION['permission']!='edit/delete') exit('access denied for user '.$_SESSION['email']);
		}

		public function update(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_editDefect');
			}
			else{
				//Successful validation

				$this->load->model('model_edit_defect');

				$result=$this->model_edit_defect->update_defect();

				if($result){
					echo "<script>alert('Defect updated successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/backlog/view_defects', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_defect($id){
			$sql =$this->db->query("SELECT * from defect where id ='$id'");
			return $sql->result();
		}

		public function get_values($id){
			$data['result']=$this->load_defect($id);

			$this->load->view('view_header');
			$this->load->view('view_editDefect',$data);
		}
	}

?>