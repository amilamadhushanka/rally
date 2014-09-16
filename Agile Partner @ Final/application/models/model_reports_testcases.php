<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_reports_testcases extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}
	
		public function countTestcases($project){

    		$query=$this->db->query("SELECT DISTINCT i.name as iteration, COUNT( t.TC_id ) AS cnt FROM testcase t, iteration i WHERE i.project =  '$project'
									AND i.name = t.IterationName GROUP BY i.name");

     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

		public function countPassTestcases($project){

    		$query=$this->db->query("SELECT DISTINCT i.name as iteration, COUNT( t.TC_id ) AS cnt FROM testcase t, iteration i WHERE i.project =  '$project'
									AND i.name = t.IterationName AND t.testcaseStatus='pass' GROUP BY i.name");

     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

	}

?>