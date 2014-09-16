<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_report_release extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}



	public function getVelocity($project){
    //$project=$this->input->post('selected_project');
    $sql = "SELECT name,plannedVelocity FROM release WHERE project='$project' ORDER BY plannedVelocity ASC";
    $this->db->select();
    $query = $this->db->get('release');
     
    if ($query->num_rows > 0) {
      return $query->result();
    }
    else {
      return FALSE;
    }

  }
}