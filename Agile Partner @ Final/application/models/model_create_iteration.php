<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_create_iteration extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function create_iteration(){
			
			$project=$this->input->post('project');
			$name=$this->input->post('txtName');
    		$theme=$this->input->post('txtTheme');
    		$startDate=$this->input->post('txtStartDate');
    		$endDate=$this->input->post('txtEndDate');
    		$state=$this->input->post('state');
    		$plannedVelocity=$this->input->post('txtPlannedVelocity');

    		 //Calculate iteration period in days
      		$start = strtotime($startDate);
      		$end = strtotime($endDate);

      		$days_between = ceil(abs($end - $start) / 86400);


    		$sql="insert into iteration (name,theme,startDate,endDate,state,plannedVelocity,project,days) 
				  values('".$name."',
				  		 ".$this->db->escape($theme).",
				  		 ".$this->db->escape($startDate).",
				  		 ".$this->db->escape($endDate).",
				  		 ".$this->db->escape($state).",
				  		 ".$this->db->escape($plannedVelocity).",
				  		 '".$project."',
				  		 ".$this->db->escape($days_between).")";

			$result=$this->db->query($sql);

			if($this->db->affected_rows()===1){

				return $name;
			}
			else{
				return false;
			}

		}

	}

?>