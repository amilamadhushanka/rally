<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_files extends CI_Model{
	
	public function __construct(){
			parent::__construct();
		}

	
    public function fupload(){

    $version = intval($_POST['select_Version']);
    $filename = $_POST['txtdocname'];    
    $adate = $_POST['datepicker'];    
    $fversion =  addslashes(file_get_contents($_FILES['doc_file']['tmp_name']));    
    $fdescription = $_POST['txtdescription'] ;

    $q = "INSERT INTO files(filename,description,file, ddate, ref) VALUES ('$filename', '$fdescription', '$fversion','$adate' ,'$version') ;";
    $result=$this->db->query($q);      
    if($this->db->affected_rows()==1){
      return true;
    }else{
      return false;
    }


  }



}


?>