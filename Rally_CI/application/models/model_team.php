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
			$department =$this->input->post('department');
			$DisplayName=$this->input->post('DisplayName');
			$time=$this->input->post('timeZone');
			$date =$this->input->post('dateFormat');
			$radio_email = $this->input->post('emailNotification');
			$disable = "0"; 
			$Subscription = "0"; 

		 	if($this->input->post('Disable'))
      		{
         		$disable = "1";   
       		}

    		if($this->input->post('subscription'))
       		{
         		$Subscription = "1";   
       		}

    		if($this->input->post('emailNotification'))
       		{
         		$radio_email = "true";   
       		}

    		else
    		{
         		$radio_email = "false";   
       		}
			
			

			$sql="insert into newteam(teamId, projectName, userName, disable, role, officeLocation, department, displayName,  emailNotification, timeZone, dateFormat, subscription) 
				  values(
				  		 ".$this->db->escape($teamId).",
				  		 ".$this->db->escape($projectName).",
				  		 ".$this->db->escape($UserName).",
				  		 ".$this->db->escape($disable).",
				  		 ".$this->db->escape($role).",
                         ".$this->db->escape($Location).",
                         ".$this->db->escape($department).",
                         ".$this->db->escape($DisplayName).",
                         ".$this->db->escape($radio_email).",
                         ".$this->db->escape($time).",
                         ".$this->db->escape($date).",
				  		 ".$this->db->escape($Subscription).")";

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















		


