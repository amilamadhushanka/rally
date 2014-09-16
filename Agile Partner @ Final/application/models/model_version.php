<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_version extends CI_Model{
	
	public function __construct(){
			parent::__construct();
		}

  
  
	public function upload(){

	$conn = mysql_connect("localhost","root","");
	if(!$conn){
		echo mysql_error();

	}
  	$db = mysql_select_db("rally",$conn);

  	if(!$db){
  		echo mysql_error();
  	}

  	
    $aproject = $_POST['select_project'];
    $adate = $_POST['datepicker'];
    $id = $_POST['txtid'];
    $fvertion =  addslashes(file_get_contents($_FILES['version_file']['tmp_name']));
    $fdatabase = addslashes(file_get_contents($_FILES['database_file']['tmp_name']));
    $fdescription = $_POST['txtdescription'] ;


  	
  	$q = "INSERT INTO versions(id,project, version_file, data_base, description,udate) VALUES ( '$id', '$aproject','$fvertion' ,'$fdatabase', '$fdescription','$adate') ;";
    $result=$this->db->query($q);      
    if($this->db->affected_rows()==1){
      return true;
    }else{
      return false;
    }
    
                  


}

}


?>