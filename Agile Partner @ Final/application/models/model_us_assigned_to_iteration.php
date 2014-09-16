<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_us_assigned_to_iteration extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function assignToIteration(){

			//Assign textbox values to variables 
    		$project=$this->input->post('project');
    		$iteration=$this->input->post('iteration');
    		$userstory=$this->input->post('userstory');
    		

    		//Insert data to DB
  			$sql="insert into assign_userstory_to_iteration (iteration,userstory,project) 
          			values('".$iteration."','".$userstory."','".$project."')";
		
          	$sql_1="UPDATE userstory SET iteration='{$iteration}' WHERE ID='{$userstory}' LIMIT 1";

          	$result=$this->db->query($sql);

			if($this->db->affected_rows()===1){

				$result_1=$this->db->query($sql_1);
				
				if($this->db->affected_rows()===1){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
	}
?>