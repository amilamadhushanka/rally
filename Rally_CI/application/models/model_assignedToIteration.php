<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_assignedToIteration extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function assignToIteration(){

			//Assign textbox values to variables 
    		$project=$this->input->post('project');
    		$iteration=$this->input->post('iteration');
    		$defect=$this->input->post('defect');
    		

    		//Insert data to DB
  			$sql="insert into assign_defect_to_iteration (iteration,defect,project) 
          			values('".$iteration."','".$defect."','".$project."')";
		
          	$sql_1="UPDATE defect SET iteration='{$iteration}' WHERE id='{$defect}' LIMIT 1"; 

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