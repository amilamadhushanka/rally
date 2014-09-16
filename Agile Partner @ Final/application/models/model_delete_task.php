<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_delete_task extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function delete_task(){

                  //Assign textbox values to variables 
            $task_name=$this->input->post('task');
    
            //Remove from DB
            $sql="DELETE  FROM newtask WHERE task_name='{$task_name}' LIMIT 1"; 
            
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