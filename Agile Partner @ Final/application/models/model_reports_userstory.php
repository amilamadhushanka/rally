<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_reports_userstory extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}
	
		public function countuserstory($project){
			$sql = "SELECT ID,Plan_estima FROM userstory WHERE project='$project' ORDER BY Plan_estima ASC";
    		$this->db->select();
    		$query = $this->db->get('userstory');
     
    		if ($query->num_rows > 0) {
      			return $query->result();
    		}
    		else {
      			return FALSE;
    		}
		}
	}

?>