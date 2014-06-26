<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class editUserstory_model extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function update_userstory(){

            //Assign textbox values to variables 
            $project=$this->input->post('project');
            $id=$this->input->post('id');
            $name=$this->input->post('name');
            $description=$this->input->post('description');
            $owner=$this->input->post('owner');
            $rank=$this->input->post('rank');
            $priority=$this->input->post('priority');
            $tags=$this->input->post('tags');
            $planEstima=$this->input->post('planEstima');
            $iteration=$this->input->post('iteration');
            $state=$this->input->post('state');
            $ready=$this->input->post('ready');
            $blocked=$this->input->post('blocked');
            $blockedReason=$this->input->post('blockedReason');
          

            
            $sql="UPDATE userstory SET Name='{$name}',Discription='{$description}',Owner='{$owner}',Priority='{$priority}',ID='{$id}',owner='{$owner}',Rank='{$rank}',Plan_estima='{$planEstima}',Tag='{$tags}',pname='{$project}',iteration='{$iteration}',state='{$state}',ready='{$ready}',blocked='{$blocked}' ,blockedReason='{$blockedReason}' WHERE ID='{$id}' LIMIT 1"; 
            
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