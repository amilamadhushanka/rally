<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_remove_df extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function remove_defect($id){

            $sql="UPDATE defect SET iteration='unscheduled' WHERE id='{$id}' LIMIT 1"; 

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