<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_deleteIteration extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function delete_iteration(){

			//Assign textbox values to variables 
      		$name=$this->input->post('txtName');

                  //Remove from DB
                  $sql="DELETE  FROM iteration WHERE name='{$name}' LIMIT 1"; 
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
            $name=$this->input->post('txtName');

            $check="SELECT * from assign_defect_to_iteration WHERE iteration='{$name}'";
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