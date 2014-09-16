<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_reports_defects extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}
	
		public function countDefects($project){

    		$query=$this->db->query("SELECT DISTINCT i.name as iteration, COUNT( d.id ) AS cnt FROM defect d, iteration i WHERE i.project =  '$project'
									AND i.name = d.iteration GROUP BY i.name");
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

		public function countDefectsByEnvironment($project){

    		$query=$this->db->query("SELECT DISTINCT environment as environment, COUNT( id ) AS cnt FROM defect WHERE project =  '$project'
									GROUP BY environment");

     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

		public function countDefectsByScheduleState($project){

    		$query=$this->db->query("SELECT DISTINCT scheduleState as scheduleState, COUNT( id ) AS cnt FROM defect WHERE project =  '$project'
									GROUP BY scheduleState");

     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

		public function countDefectsByState($project){

    		$query=$this->db->query("SELECT DISTINCT state as state, COUNT( id ) AS cnt FROM defect WHERE project =  '$project'
									GROUP BY state");

     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}

	}

?>