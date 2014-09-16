<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_edit_project extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update_project(){          

            $name=$this->input->post('projectname');
            $discription1=$this->input->post('description');
            $discription = str_replace(' ','',$discription1);

            $state = $this->input->post('txtState');
            $owner=$this->input->post('txtowner');
            $timezone=$this->input->post('txttimezone');
            $date_format = $this->input->post('txtdateFormat');
            $date_and_time_formate=$this->input->post('txtdateTimeFormat');
    
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

            if ($this->input->post('check_state'))                 { $state = $this->input->post('state'); }
            if ($this->input->post('check_owner'))                 { $owner=$this->input->post('owner');   }
            if ($this->input->post('checktimezone'))               { $timezone=$this->input->post('timezone'); }
            if ($this->input->post('checkdate_formate'))           { $date_format = $this->input->post('date_formate');}
            if ($this->input->post('check_date_and_time_formate')) {$date_and_time_formate=$this->input->post('date_and_time_formate'); }

            if($this->input->post('check_sunday'))   { $chksuday = "1"; }
            if($this->input->post('check_monday'))   { $chkmonday = "1";}
            if($this->input->post('check_tuesday'))  { $chktuesday = "1";}
            if($this->input->post('check_wednesday')){ $chkwednessday = "1";}
            if($this->input->post('check_thursday')) { $chkthursday = "1";}
            if($this->input->post('check_friday'))   { $chkfriday = "1";}
            if($this->input->post('check_saturday')) { $chksaturday = "1";}

            $week =  $chksuday . $chkmonday . $chktuesday . $chkwednessday . $chkthursday . $chkfriday . $chksaturday;

            if ($this->input->post('changest')) { $changest = "1"; }          

            $sql="UPDATE project SET discription='{$discription}',state='{$state}',owner='{$owner}',timezone='{$timezone}',date_format='{$date_format}',date_time_format='{$date_and_time_formate}',workdays='{$week}', changest='{$changest}', user_story='{$user_story}',defect='{$defects}',tasks='{$task}' WHERE name='{$name}' LIMIT 1"; 
            		  
            $result=$this->db->query($sql);

			if($this->db->affected_rows()==1){
				return true;
			}else{
				return false;
			}

		}

	}

?>