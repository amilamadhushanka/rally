<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_delete_userstory extends CI_Model
    {	
		public function __construct(){
			parent::__construct();
		}

		public function delete_userstory(){

			//Assign textbox values to variables 
    		$id=$this->input->post('id');
    
            //Remove from DB
            $sql="DELETE  FROM userstory WHERE ID='{$id}' LIMIT 1"; 
            
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