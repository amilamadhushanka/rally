<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_track extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function moveDefectToInProgress($id){                  

            $sql="UPDATE defect SET scheduleState='In-Progress' WHERE id='{$id}' LIMIT 1";

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }
            
        public function moveUserStoryToInProgress($id){
                
            $sql="UPDATE userstory SET sch_state='In-Progress' WHERE ID='{$id}' LIMIT 1";
                
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }

        public function moveDefectToDefined($id){
                 
            $sql="UPDATE defect SET scheduleState='Defined' WHERE id='{$id}' LIMIT 1";

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }

        public function moveUserStoryToDefined($id){

            $sql="UPDATE userstory SET sch_state='Defined' WHERE ID='{$id}' LIMIT 1";
                
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }

        public function moveDefectToCompleted($id){
              
            $sql="UPDATE defect SET scheduleState='Completed' WHERE id='{$id}' LIMIT 1";
                
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }

        public function moveUserStoryToCompleted($id){

            $sql="UPDATE userstory SET sch_state='Completed' WHERE ID='{$id}' LIMIT 1";
                
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }  
        }

        public function moveDefectToAccepted($id){
         
            $sql="UPDATE defect SET scheduleState='Accepted' WHERE id='{$id}' LIMIT 1";
            
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }
        }

        public function moveUserStoryToAccepted($id){

            $sql="UPDATE userstory SET sch_state='Accepted' WHERE ID='{$id}' LIMIT 1";
                
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