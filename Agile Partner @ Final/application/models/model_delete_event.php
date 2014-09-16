<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_delete_event extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function delete_event(){

			//Assign textbox values to variables 
            $id=$this->input->post('txtId');

            //remove existing records
            $sql ="SELECT count(id) as cnt FROM events WHERE id='$id'";
            $result=$this->db->query($sql);
            $row = $result->row_array();
            $count=$row['cnt'];

            while($count>0){
                $sql="DELETE FROM events WHERE id='{$id}' LIMIT 1";
                $result=$this->db->query($sql);
                $count=$count-1;
            }

            if($this->db->affected_rows()===1){
                return true;
            }
            else{
                return false;
            }

        }
    }
?>