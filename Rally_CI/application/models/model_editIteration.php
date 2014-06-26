<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_editIteration extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update_iteration(){

			//Assign textbox values to variables 
			$project=$this->input->post('project');
      		$name=$this->input->post('txtName');
      		$theme=$this->input->post('txtTheme');
      		$startDate=$this->input->post('txtStartDate');
      		$endDate=$this->input->post('txtEndDate');
      		$state=$this->input->post('state');
      		$PlannedVelocity=$this->input->post('txtPlannedVelocity');

      		 //Calculate iteration period in days
      		$start = strtotime($startDate);
      		$end = strtotime($endDate);

      		$days = ceil(abs($end - $start) / 86400);

      		//Insert data to DB
            $sql="UPDATE iteration SET theme='{$theme}',startDate='{$startDate}',endDate='{$endDate}',state='{$state}',PlannedVelocity='{$PlannedVelocity}',days='{$days}' WHERE name='{$name}' LIMIT 1"; 
            
            //print_r($sql);

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                return true;
            }
            else{
                return false;
            }
		}
	}
?>