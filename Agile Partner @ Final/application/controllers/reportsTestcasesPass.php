<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ReportsTestcasesPass extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_reports_testcases');
		}

		public function load($project,$sortBy){
			//General
			if($project=="All"){
				$query = $this->db->query("SELECT DISTINCT t.IterationName,t.USid,t.TC_id,t.TC_Name,t.WorkProduct,t.Type,t.TC_Priority,t.TC_Owner,
											t.Method,t.LastVerdict,t.LastBuilt,t.LastRun,t.pname,t.preCondition,t.testProcedure,t.testInputs,t.expectedResults,t.testcaseStatus,u.fName,u.lName,s.Name FROM 
											testcase t,users u,userstory s WHERE t.TC_Owner=u.username AND t.USid=s.ID AND t.testcaseStatus='pass' ORDER BY t.$sortBy ASC");
			}
			elseif($project!="All"){
				$query = $this->db->query("SELECT DISTINCT t.IterationName,t.USid,t.TC_id,t.TC_Name,t.WorkProduct,t.Type,t.TC_Priority,t.TC_Owner,
											t.Method,t.LastVerdict,t.LastBuilt,t.LastRun,t.pname,t.preCondition,t.testProcedure,t.testInputs,t.expectedResults,t.testcaseStatus,u.fName,u.lName,s.Name FROM 
											testcase t,users u,userstory s WHERE t.TC_Owner=u.username AND t.USid=s.ID AND t.pname='$project' AND t.testcaseStatus='pass' ORDER BY t.$sortBy ASC");
			}
			$data['testcase'] = $query->result_array();

			//Testcase count
			if($project=="All"){
				$query = $this->db->query('SELECT count(*) as cnt from testcase where testcaseStatus="pass"');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT count(*) as cnt from testcase where pname='$project' AND testcaseStatus='pass'");
			}
			$data['testcase_count'] = $query->result_array();

			//priority
			if($project=="All"){
				$query = $this->db->query('SELECT TC_Priority,count(*) as cnt from testcase where testcaseStatus="pass" group by TC_Priority');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT TC_Priority,count(*) as cnt from testcase where pname='$project' AND testcaseStatus='pass' group by TC_Priority");
			}
			$data['testcases_priority'] = $query->result_array();

			//testcase Status
			if($project=="All"){
				$query = $this->db->query('SELECT testcaseStatus,count(testcaseStatus) as cnt from testcase where AND testcaseStatus="pass" group by testcaseStatus');
			}
			elseif ($project!="All") {
				$query = $this->db->query("SELECT testcaseStatus,count(testcaseStatus) as cnt from testcase where pname='$project' AND testcaseStatus='pass' group by testcaseStatus");
			}
			$data['testcase_status'] = $query->result_array();		

			//selected project
			$data['project']=$project;

			//sortBy
			$data['sortBy']=$sortBy;

			//graphs
			$data['graph'] = $this->model_reports_testcases->countTestcases($project);
			$data['graphPass'] = $this->model_reports_testcases->countPassTestcases($project);

			$this->load->view('view_header');
			$this->load->view('view_reports_testcase_pass',$data);
		}

	}

?>