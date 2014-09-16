<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_assign_testcase_to_member extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function assignToMember(){

            //Assign textbox values to variables 
            $iName=$this->input->post('iteration');
            $uid=$this->input->post('userstory');
            $tcid=$this->input->post('testcase');
            $tcOwner=$this->input->post('assignedTo');
            $pname=$this->input->post('project');            

            $sql="UPDATE testcase SET TC_Owner='{$tcOwner}' WHERE IterationName='{$iName}' AND USid='{$uid}' AND TC_id='{$tcid}' AND pname='{$pname}' LIMIT 1"; 
            
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