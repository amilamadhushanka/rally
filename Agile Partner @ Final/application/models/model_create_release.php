<?php

class Model_create_release extends CI_Model
{

	function add_Release(){
      	$project=$this->input->post('project');
		$name=$this->input->post('name');
		//$theme=$this->input->post('theme');
		$startDate=$this->input->post('startDate');
		$releaseDate=$this->input->post('releaseDate');
		$version=$this->input->post('version');
		$state=$this->input->post('state');
		$plannedVelocity =$this->input->post('plannedVelocity');
		
		
		


		$sql="INSERT INTO `release` (`name`, `theme`, `startDate`, `releaseDate`, `version`, `state`, `plannedVelocity`, `project`)
		VALUES('".$name."',
				 '',
				 '".$startDate."',
				 '".$releaseDate."',
				 '".$version."',
				 '".$state."',
				 '".$plannedVelocity."',
				 '".$project."')";

			$result=$this->db->query($sql);

			if($this->db->affected_rows()===1){

				return true;
			}
			else{
				return false;
			}
    }


}