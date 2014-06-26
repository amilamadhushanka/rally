<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_deleteDefect extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function delete_defect(){

			//Assign textbox values to variables 
    		$id=$this->input->post('txtId');
                
                //Remove from DB
                $sql="DELETE  FROM defect WHERE id='{$id}' LIMIT 1"; 
            
                //print_r($sql);

                $result=$this->db->query($sql);

                if($this->db->affected_rows()===1){
                    return true;
                }
                else{
                    return false;
                }
        
        }

        public function check(){

            //Assign textbox values to variables 
            $id=$this->input->post('txtId');

            $check="SELECT * from assign_defect_to_iteration WHERE defect='{$id}'";
            $check_result=$this->db->query($check);

            if($this->db->affected_rows()===1){
                return false;
            }
            else{
                return true;
            }
        }
    }
?>