<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class RemoveUS_model extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function remove_userstory($id){

            //Remove from DB
            $sql="DELETE  FROM assign_userstory_to_iteration WHERE userstory='{$id}' LIMIT 1"; 
            
            $sql_1="UPDATE userstory SET iteration='unscheduled' WHERE ID='{$id}' LIMIT 1"; 
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