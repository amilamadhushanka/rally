<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_images extends CI_Model{
	
	public function __construct(){
			parent::__construct();
      $this->load->helper(array('form', 'url'));
		}


	public function upload(){  	
    
  	$aproject = $_POST['select_project'];
  	$adate = date('Y-m-d H:i:s');
  	$aphoto = addslashes(file_get_contents($_FILES['image_file']['tmp_name']));
  	$image = getimagesize($_FILES['image_file']['tmp_name']); // to know about image type etc

  	$sender = $_SESSION['email'];

  	$imgtype = $image['mime'];

   
  	$q = "INSERT INTO image(project, image,details,sender,sdate) VALUES ('$aproject', '$aphoto','$imgtype', '$sender','$adate') ;";


    $result=$this->db->query($q);
      
    if($this->db->affected_rows()==1){

      return true;
    }else{
      return false;
    }
                  


}
}


?>