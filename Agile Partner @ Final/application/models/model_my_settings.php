<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_my_settings extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update_user_info(){

			//Assign textbox values to variables 
                  $name=$_SESSION['email'];
			$fName=$this->input->post('txtfName');
      		$lName=$this->input->post('txtlName');
      		$phone=$this->input->post('txtPhone');
      		$company=$this->input->post('txtCompany');
      		$country=$this->input->post('txtCountry');
                  $pic=$this->input->post('profilePic');
                  
                  if($pic){
                        $profilePic =  addslashes(file_get_contents($_FILES['profilePic']['tmp_name']));
      		}
                  else{
                        $profilePic=false;
                  }
                  //Insert data to DB
                  if($profilePic){
                        $sql="UPDATE users SET fName='{$fName}',lName='{$lName}',pic='{$profilePic}',phone='{$phone}',company='{$company}',country='{$country}' WHERE username='{$name}' LIMIT 1"; 
                  }
                  else{
                        $sql="UPDATE users SET fName='{$fName}',lName='{$lName}',phone='{$phone}',company='{$company}',country='{$country}' WHERE username='{$name}' LIMIT 1";      
                  }
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