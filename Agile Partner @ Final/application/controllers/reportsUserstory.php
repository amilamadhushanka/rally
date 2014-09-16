<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ReportsUserstory extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_reports_userstory');
		}

		public function load($project){
			//userstory
			if($project=="All"){
				$query = $this->db->query('SELECT DISTINCT us.ID,us.Name,us.Plan_estima,us.Priority,us.Owner,us.iteration,u.fName,u.lName FROM userstory us,users u WHERE us.Owner=u.username ORDER BY us.ID ASC');
			}
			elseif($project!="All"){
				$query = $this->db->query("SELECT DISTINCT us.ID,us.Name,us.Plan_estima,us.Priority,us.Owner,us.iteration,u.fName,u.lName FROM userstory us,users u WHERE us.Owner=u.username AND us.pname='$project' ORDER BY us.ID ASC");
			}
			
			$data['userstory'] = $query->result_array();

			//priority
			if($project=="All"){
				$query = $this->db->query('SELECT Priority,count(*) as cnt from userstory group by Priority');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT Priority,count(*) as cnt from userstory where pname='$project' group by Priority");
			}
			$data['us_priority'] = $query->result_array();


			//state
			if($project=="All"){
				$query = $this->db->query('SELECT state,count(state) as cnt from userstory group by state');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT state,count(state) as cnt from userstory where pname='$project' group by state");
			}
			$data['us_state'] = $query->result_array();

			//userstory count
			if($project=="All"){
				$query = $this->db->query('SELECT count(*) as cnt from userstory');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT count(*) as cnt from userstory where pname='$project'");
			}
			$data['us_count'] = $query->result_array();			

			//selected project
			$data['project']=$project;

			//graph
			$data['graph'] = $this->model_reports_userstory->countuserstory($project);

			$this->load->view('view_header');
			$this->load->view('view_reports_userstory',$data);
		}

	}

?>