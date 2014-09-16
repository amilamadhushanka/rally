<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateRelease extends CI_Controller {

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

	public function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('html');
		session_start();
		if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
	}
public function index()
	{
				
		$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('name','Release Name','required|xss_clean');
			$this->form_validation->set_rules('project','Project Name','required|xss_clean');
			//$this->form_validation->set_rules('iteration','Iteration Name','required|xss_clean');
			
			
			//$this->form_validation->set_rules($rules);

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('view_createRelease');
			}
			else{
				//Successful validation

				$this->load->model('model_create_release');

				$result=$this->model_create_release->add_Release();

				if($result){
					echo "<script>alert('Release created successfully.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/createRelease', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
	}
	
} 