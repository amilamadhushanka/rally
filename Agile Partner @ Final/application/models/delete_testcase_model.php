<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Delete_testcase_model extends CI_Model
    {   
        public function __construct(){
            parent::__construct();
        }

        public function delete_testcase(){

            //Assign textbox values to variables 
            $tc_id=$this->input->post('tcid');
            $it_id=$this->input->post('iName');
            $uc_id=$this->input->post('uid');
    
            //Remove from DB
            $sql="DELETE  FROM testcase WHERE TC_id='{$tc_id}' AND IterationName='{$it_id}' AND USid='{$uc_id}' LIMIT 1"; 
            
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