<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class HomeSelectProject extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){

			$this->load->library('form_validation');
			//set rules
			$this->form_validation->set_rules('select_project','Project','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to select project page and show errors.
				$this->load->view('view_homeSelectProject');
			}
			else{
				//Successful validation
				$project=$this->input->post('select_project');

				if(isset($project)){
					//get role
					$user=$_SESSION['email'];
					
					if($project!='newProject'){
						$query = $this->db->query("SELECT * FROM newteam WHERE userName='$user' AND projectName='$project'");
						$role=$query->result_array();
						foreach ($role as $row) {
							$_SESSION['teamRole']=$row['role'];
							$_SESSION['team']=$row['teamId'];
							$_SESSION['permission']=$row['permission'];
						}
					}
					elseif ($project=='newProject') {
						$_SESSION['teamRole']='Scrum Master';
					}

					$_SESSION['project'] = $project;

					$query = $this->db->query("SELECT DISTINCT owner,count(id) as cnt FROM defect WHERE owner='$user' AND project='$project' AND notify=FALSE");
					$data['notifyCount'] = $query->result_array();

					date_default_timezone_set ("Asia/Colombo"); 
					$today=date("Y-m-d");
					$query = $this->db->query("SELECT DISTINCT notifyTo,count(id) as cnt FROM events WHERE notifyTo='$user' AND date='$today' AND notify=FALSE");
					$data['eventNotifyCount'] = $query->result_array();

					$this->load->view('view_header');
					$this->load->view('view_home',$data);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

	}

?>