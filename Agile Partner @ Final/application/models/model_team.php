<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_team extends CI_Model{

	/*var $disable = "0"; 
	var $Subscription = "0";
	var $radio_email ="";*/
		
		public function __construct(){
			parent::__construct();
		}



		public function insert_user(){

			$teamId=$this->input->post('team');
			$projectName=$this->input->post('project');
			
			$UserName=$this->input->post('UserName');
			$role=$this->input->post('role');
			$Location=$this->input->post('location');
			$permission=$this->input->post('permission');

			$sql="insert into newteam(teamId, projectName,UserName,role,officeLocation,permission) 
				  values(
				  		 ".$this->db->escape($teamId).",
				  		 ".$this->db->escape($projectName).",
				  		 ".$this->db->escape($UserName).",
				  		 ".$this->db->escape($role).",
				  		 ".$this->db->escape($Location).",
				  		 ".$this->db->escape($permission).")";
			//print_r($sql);

			$result=$this->db->query($sql);

			if($this->db->affected_rows()==1){

				return true;
			}
			else
			{
				return false;
			}
  }

}

?>















		


