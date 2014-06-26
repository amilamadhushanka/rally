<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class editTestcase_model extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function update_Testcase(){

            //Assign textbox values to variables 
            $iName=$this->input->post('iName');
            $uid=$this->input->post('uid');
            $tcid=$this->input->post('tcid');
            $tcName=$this->input->post('tcName');
            $workProduct=$this->input->post('workProduct');
            $type=$this->input->post('type');
            $tcPriority=$this->input->post('tcPriority');
            $tcOwner=$this->input->post('tcOwner');
            $method=$this->input->post('method');
            $lastVerdict=$this->input->post('lastVerdict');
            $lastBuilt=$this->input->post('lastBuilt');
            $lastRun=$this->input->post('lastRun');
            $pname=$this->input->post('pname');
            
            

            

            $sql="UPDATE testcase SET TC_Name='{$tcName}',WorkProduct='{$workProduct}',Type='{$type}',TC_Priority='{$tcPriority}',TC_Owner='{$tcOwner}',Method='{$method}',LastVerdict='{$lastVerdict}',LastBuilt='{$lastBuilt}',LastRun='{$lastRun}',pname='{$pname}' WHERE IterationName='{$iName}' AND USid='{$uid}' AND TC_id='{$tcid}' LIMIT 1"; 
            
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