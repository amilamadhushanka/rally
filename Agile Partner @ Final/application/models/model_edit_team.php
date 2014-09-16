<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_edit_team extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function addMember($team,$project,$username){

      	//Insert data to DB

            $sql="INSERT INTO newteam (teamId,projectName,userName) VALUES('$team','$project','$username')";
            //print_r($sql);teamId

            $result=$this->db->query($sql);

            if($this->db->affected_rows()===1){

                return true;
            }
            else{
                return false;
            }

		}

            public function removeMember($team,$username){
                  //Remove from DB
                  $sql="DELETE FROM newteam WHERE teamId='$team' AND userName='$username' LIMIT 1"; 
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