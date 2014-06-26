<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddTestcase extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
				
		$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('iName','Iteration Name','required|xss_clean');
			$this->form_validation->set_rules('pname','Project Name','required|xss_clean');
			$this->form_validation->set_rules('uid','User story ID','required|xss_clean');
			$this->form_validation->set_rules('tcid','Testcase ID','required|xss_clean');
			$this->form_validation->set_rules('tcName','Testcase Name','required|xss_clean');
			
			//$this->form_validation->set_rules($rules);

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('addTestcase_view');
			}
			else{
				//Successful validation

				$this->load->model('addTestcase_model');

				$result=$this->addTestcase_model->add_testcase();

				if($result){
					echo "<script>alert('Testcase created successfully.')</script>";
					redirect('http://localhost/Rally_CI/addTestcase', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
	}
	
} 