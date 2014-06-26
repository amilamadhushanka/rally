<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newtask extends CI_Controller {

	public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');

		}
	public function index(){
			//$this->load->view('view_newProject');


			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('task', 'Task Id', 'required|is_unique[newtask.task_name]|xss_clean');

			if($this->form_validation->run()==FALSE)
			{
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('view_newTask');
				
			}

			else
			{
				//Successful validation

				$this->load->model('model_task');

				$result=$this->model_task->insert_task();

				if($result)
				{
					echo "<script>alert('Project created successfully.')</script>";
					redirect('http://localhost/Rally_CI/newtask', 'refresh'); 
				}

				else
				{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}


	}

?>
