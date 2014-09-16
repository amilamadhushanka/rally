<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_user_permission extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update(){

		    $permission=$this->input->post('permission');
                $team=$_SESSION['team'];
                $user=$this->input->post('txtUserName');

      	     //Insert data to DB
                  $sql="UPDATE newteam SET permission='{$permission}' WHERE teamId='{$team}' AND userName='{$user}' LIMIT 1"; 

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