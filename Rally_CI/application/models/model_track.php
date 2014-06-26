<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_track extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function moveToInProgress($id){                  

            $sql="UPDATE defect SET scheduleState='In-Progress' WHERE id='{$id}' LIMIT 1"; 

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                return true;
            }
            else{
                return false;
            }
        }

        public function moveToDefined($id){                  

            $sql="UPDATE defect SET scheduleState='Defined' WHERE id='{$id}' LIMIT 1"; 
            
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                return true;
            }
            else{
                return false;
            }
        }

        public function moveToCompleted($id){                  

            $sql="UPDATE defect SET scheduleState='Completed' WHERE id='{$id}' LIMIT 1"; 
            
            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                return true;
            }
            else{
                return false;
            }
        }

        public function moveToAccepted($id){                  

            $sql="UPDATE defect SET scheduleState='Accepted' WHERE id='{$id}' LIMIT 1"; 
            
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