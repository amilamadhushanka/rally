<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_newProject extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function create_project(){

      		$name=$this->input->post('txtProjectName');
            $discription=$this->input->post('description');
            $state = $this->input->post('state');
            $owner=$this->input->post('owner');
            $timezone=$this->input->post('timezone');
            $date_format = $this->input->post('date_formate');
            $date_and_time_formate=$this->input->post('date_and_time_formate');
    
            $chksuday = "0";
            $chkmonday = "0";
            $chktuesday = "0";
            $chkwednessday = "0";
            $chkthursday = "0";
            $chkfriday = "0";
            $chksaturday = "0";

            $changest = "0";

            $user_story=$this->input->post('txtUserStory');
            $defects=$this->input->post('txtDfect');
            $task=$this->input->post('txtTask');    
    

            if($this->input->post('check_sunday'))
        	
            {
                $chksuday = "1";
            }
            if($this->input->post('check_monday'))
            {
                $chkmonday = "1";
            }
            if($this->input->post('check_tuesday'))
            {
                $chktuesday = "1";
            }
            if($this->input->post('check_wednesday'))
            {
                $chkwednessday = "1";
            }
            if($this->input->post('check_thursday'))
            {
                $chkthursday = "1";
            }
            if($this->input->post('check_friday'))
            {
                $chkfriday = "1";
            }
            if($this->input->post('check_saturday'))
            {
                $chksaturday = "1";
            }


             $week =  $chksuday . $chkmonday . $chktuesday . $chkwednessday . $chkthursday . $chkfriday . $chksaturday;


            if ($this->input->post('changest'))
            {
                $changest = "1";   
            }


    		$sql="insert into project (name,discription,state,owner,timezone,date_format,date_time_format,workdays,changest,user_story,defect,tasks) 
				  values(
				  		 ".$this->db->escape($name).",
				  		 ".$this->db->escape($discription).",
				  		 ".$this->db->escape($state).",
				  		 ".$this->db->escape($owner).",
				  		 ".$this->db->escape($timezone).",
                         ".$this->db->escape($date_format).",
                         ".$this->db->escape($date_and_time_formate).",
                         ".$this->db->escape($week).",
                         ".$this->db->escape($changest).",
                         ".$this->db->escape($user_story).",
                         ".$this->db->escape($defects).",
				  		 ".$this->db->escape($task).")";

			$result=$this->db->query($sql);

			if($this->db->affected_rows()==1){

				return true;
			}
			else{
				return false;
			}

		}

	}

?>