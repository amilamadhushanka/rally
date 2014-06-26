<?php

class addTestcase_model extends CI_Model
{

	function add_testcase(){
      	$pname=$this->input->post('pname');
		$iName=$this->input->post('iName');
		$uID=$this->input->post('uid');
		$tcID=$this->input->post('tcid');
		$tcName=$this->input->post('tcName');
		$workProduct=$this->input->post('workProduct');
		$type=$this->input->post('type');
		$tcPriority =$this->input->post('tcPriority');
		$tcOwner=$this->input->post('tcOwner');
		$method =$this->input->post('method');
		$lastVerdict=$this->input->post('lastVerdict');
		$lastBuilt=$this->input->post('lastBuilt');
		$lastRun =$this->input->post('lastRun');
		


		$sql="INSERT INTO testcase (IterationName,USid,TC_id,TC_Name,WorkProduct,Type,TC_Priority,TC_Owner,Method,LastVerdict,LastBuilt,LastRun,pname) 
		VALUES ('".$iName."',
				 '".$uID."',
				 '".$tcID."',
				 '".$tcName."',
				 '".$workProduct."',
				 '".$type."',
				 '".$tcPriority."',
				 '".$tcOwner."',
				 '".$method."',
				 '".$lastVerdict."',
				 '".$lastBuilt."',
				 '".$lastRun."',
				 '".$pname."')";

			$result=$this->db->query($sql);

			if($this->db->affected_rows()===1){

				return true;
			}
			else{
				return false;
			}
    }


}