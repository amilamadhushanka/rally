<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ReportsDefectsState extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_reports_defects');
		}

		public function load($project,$sortBy){

			//Defects
			if($project=="All"){
				$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.description,d.state,d.iteration,d.planEstimate,d.priority,d.severity,d.creationDate,d.targetDate,d.owner,u.fName,u.lName FROM defect d,users u WHERE d.owner=u.username ORDER BY d.$sortBy ASC");
			}
			elseif($project!="All"){
				$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.description,d.state,d.iteration,d.planEstimate,d.priority,d.severity,d.creationDate,d.targetDate,d.owner,u.fName,u.lName FROM defect d,users u WHERE d.owner=u.username AND d.project='$project' ORDER BY d.$sortBy ASC");
			}
			$data['defect'] = $query->result_array();

			//priority
			if($project=="All"){
				$query = $this->db->query('SELECT priority,count(*) as cnt from Defect group by priority');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT priority,count(*) as cnt from Defect where project='$project' group by priority");
			}
			$data['defect_priority'] = $query->result_array();


			//severity
			if($project=="All"){
				$query = $this->db->query('SELECT severity,count(severity) as cnt from Defect group by severity');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT severity,count(severity) as cnt from Defect where project='$project' group by severity");
			}
			$data['defect_severity'] = $query->result_array();

			//state
			if($project=="All"){
				$query = $this->db->query('SELECT state,count(state) as cnt from Defect group by state');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT state,count(state) as cnt from Defect where project='$project' group by state");
			}
			$data['defect_state'] = $query->result_array();

			//Defects count
			if($project=="All"){
				$query = $this->db->query('SELECT count(*) as cnt from Defect');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT count(*) as cnt from Defect where project='$project'");
			}
			$data['defect_count'] = $query->result_array();			

			//selected project
			$data['project']=$project;

			//sortBy
			$data['sortBy']=$sortBy;

			//graph
			$data['graph'] = $this->model_reports_defects->countDefectsByState($project);

			$this->load->view('view_header');
			$this->load->view('view_reports_defects_state',$data);
		}

	}

?>