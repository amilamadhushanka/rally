<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_defect_details extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function change_defect_state(){

			//Assign textbox values to variables
            
            $id=$this->input->post('txtId'); 
    		$state=$this->input->post('state');
    		
            //Insert data to DB
            $sql="UPDATE defect SET state='{$state}' WHERE id='{$id}' LIMIT 1"; 
            
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