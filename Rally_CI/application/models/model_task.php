<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_task extends CI_Model{

	/*var $disable = "0"; 
	var $Subscription = "0";
	var $radio_email ="";*/
		
		public function __construct(){
			parent::__construct();
		}



		public function insert_task(){

		$Projectname=$this->input->post('projectname');
	  	$Userstory = $this->input->post('userstory'); 
    	$Task = $this->input->post('task');
    	$Description = $this->input->post('description');
    	$Owner = $this->input->post('owner');
    	$EstimatedTime = $this->input->post('time') ;  
    	$ToDo =$this->input->post('toDo'); 
    	$Ready = "0"; 
    	$Blocked = "0";    
    	$BlockedReason = $this->input->post('blockedreason');

    	if ($this->input->post('ready')) 
       	{
          $Ready = "1";   
       	}

    	if ($this->input->post('blocked')) 
       	{
         $Blocked  = "1";   
       	}



	
			

			$sql="insert into newtask(project_name,user_story,task_name,description,owner,estimated_time,to_do,ready,blocked,blocked_reason) 
				  values(
				  		 ".$this->db->escape($Projectname).",
				  		 ".$this->db->escape($Userstory).",
				  		 ".$this->db->escape($Task).",
				  		 ".$this->db->escape($Description).",
				  		 ".$this->db->escape($Owner).",
                         ".$this->db->escape($EstimatedTime).",
                         ".$this->db->escape($ToDo).",
                         ".$this->db->escape($Ready).",
                         ".$this->db->escape($Blocked).",
                         ".$this->db->escape($BlockedReason).")";

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

