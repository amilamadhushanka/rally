<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_assigned_to_release extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function assignToRelease(){

			//Assign textbox values to variables 
    		$project=$this->input->post('project');
    		$iteration=$this->input->post('iteration');
    		$defect=$this->input->post('release');
    		

    		//Insert data to DB
  			$sql="insert into assign_iteration_to_release (iteration,release,project) 
          			values('".$iteration."','".$release."','".$project."')";
		
          	$sql_1="UPDATE iteration SET release_name='{$release}' WHERE name='{$iteration}' LIMIT 1"; 

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