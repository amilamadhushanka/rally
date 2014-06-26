<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_removeDF extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function remove_defect($id){

            //Remove from DB
            $sql="DELETE  FROM assign_defect_to_iteration WHERE defect='{$id}' LIMIT 1"; 
            
            $sql_1="UPDATE defect SET iteration='unscheduled' WHERE id='{$id}' LIMIT 1"; 
            //print_r($sql);

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                $result_1=$this->db->query($sql_1);
                if($this->db->affected_rows()===1){

                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
    }
?>