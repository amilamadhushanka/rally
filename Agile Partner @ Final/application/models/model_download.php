<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_download extends CI_Model{
	
	public function __construct(){
			parent::__construct();
		}

  
  
	public function getversion(){


	$conn = mysql_connect("localhost","root","");
	if(!$conn){
		echo mysql_error();

	}
  	$db = mysql_select_db("rally",$conn);

  	if(!$db){
  		echo mysql_error();
  	}


     $query = $this->db->select('*')->from('versions')->get();
      return $query->result();

  }
}

  	
    

?>