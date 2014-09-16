<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class model_editRelease extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function update_release(){

            //Assign textbox values to variables 
            $name=$this->input->post('name');
            $theme=$this->input->post('theme');
            $startDate=$this->input->post('startDate');
            $releaseDate=$this->input->post('releaseDate');
            $version=$this->input->post('version');
            $state=$this->input->post('state');
            $plannedVelocity=$this->input->post('plannedVelocity');
            $project=$this->input->post('project');
            

            

            $sql="UPDATE `release` SET `name`='{$name}',`theme`='{$theme}',`startDate`='{$startDate}',`releaseDate`='{$releaseDate}',`version`='{$version}',`state`='{$state}',`plannedVelocity`='{$plannedVelocity}',`project`='{$project}' WHERE `name`='{$name}' LIMIT 1"; 
            
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