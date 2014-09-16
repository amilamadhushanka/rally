<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Us_controller extends CI_Controller {

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
			$this->form_validation->set_rules('project','Project','required|xss_clean');
			$this->form_validation->set_rules('uid','ID','required|xss_clean');
			
			//$this->form_validation->set_rules($rules);

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$this->load->view('view_addUs');
			}
			else{
				//Successful validation

				$this->load->model('model_get_us');

				$result=$this->model_get_us->add_us();

				if($result){
					echo "<script>alert('Userstory created successfully.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/us_controller', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
	}
	
}