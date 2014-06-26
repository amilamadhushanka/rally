<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_Assign_UnAssignTask extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update_task(){

			//Assign textbox values to variables 
			$Projectname=$this->input->post('projectname');
                  $Userstory = $this->input->post('userstory'); 
                  $Task = $this->input->post('task');
                  $Description = $this->input->post('description');
                  $Owner = $this->input->post('owner');
                  $EstimatedTime = $this->input->post('time') ;  
                  $ToDo =$this->input->post('toDo'); 
                  $Ready = '0'; 
                  $Blocked ='0';   
                  $BlockedReason = $this->input->post('blockedreason');

               
                  if ($this->input->post('ready')) 
                  {
                        $Ready = "1";   
                  }

                  if ($this->input->post('blocked'))
                  {
                        $Blocked  = "1";   
                  }

      		//Insert data to DB
                      
            $sql="UPDATE newtask SET project_name='{$Projectname}',user_story='{$Userstory}',description='{$Description}',owner='{$Owner}',estimated_time='{$EstimatedTime}',to_do='{$ToDo}', ready='{$Ready}',blocked='{$Blocked}',blocked_reason='{$BlockedReason}' WHERE task_name='{$Task}'LIMIT 1";
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