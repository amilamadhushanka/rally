<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_teamload extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function load($pname){ 
           
            $est_pre_person = self::getEstimatedTimePerPerson($pname);
            $projectplanedtime = self::getProjectPlanedTime($pname);
            $projectplanedtimeInWeeks = round($projectplanedtime/7.0,2);
            $workingDaysPerWeek = self::getWorkingDays($pname);
            $daysToWorkingDays = $projectplanedtimeInWeeks * $workingDaysPerWeek ;
            $WorkingHours = $daysToWorkingDays * 8;
            $numberofMembers =ceil($est_pre_person/$WorkingHours);

            $whole = array($est_pre_person, $projectplanedtime, $projectplanedtimeInWeeks, $workingDaysPerWeek, $daysToWorkingDays, $WorkingHours, $numberofMembers, $pname );
           
            return $whole;

          }


    public function getEstimatedTimePerPerson($project){

            $value = 0;
            $result = mysql_query("SELECT estimated_time FROM `newtask`WHERE project_name = '$project'");
            while ($row = mysql_fetch_array($result)) {
            $value = $value + $row['estimated_time'];      
            }
            return $value;  
    }


    public function getProjectPlanedTime($project){

            $value = 0;
            $result = mysql_query("SELECT days from iteration where project = "."'$project' ");
            while ($row = mysql_fetch_array($result)) {
            $value = $value + $row['days'];      
            }
            return $value; 
    }


    public function getWorkingDays($project){

      $valuestring = ''; 
      $value = 0; 
      $result = mysql_query("SELECT workdays from project where name = "."'$project' ");
      while ($row = mysql_fetch_array($result)) {
        $valuestring = $row['workdays'];      
      }

      //echo $valuestring;
      for ($x=0; $x<7; $x++) {
        if($valuestring{$x}=='1'){
          $value = $value + 1;
        }
      }
        
      return $value;
      
    }

    
	}

?>