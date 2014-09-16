<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_delete_release extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function delete_release(){

			//Assign textbox values to variables 
      		$name=$this->input->post('name');

                  //Remove from DB
                  $sql="DELETE FROM `release` WHERE `name`='{$name}' LIMIT 1"; 
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