<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_feedback extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function sendFeedback(){          

            $user=$this->input->post('from');
            $type=$this->input->post('type');
            $feedbackfor = $this->input->post('nfeedbackfor');
            //print_r($feedbackfor);
            $date=$this->input->post('cdate');
            $feedback=$this->input->post('txtfeedback');
            
            
                  $sql = "insert into feedback( type, about, comment, user, datentime) values ('".$type."','".$feedbackfor."','".$feedback."','".$user ."','".$date."')";
                  $result=$this->db->query($sql);

      
                  if($this->db->affected_rows()==1){
                              return true;
                  }else{
                        return false;
                  }
                  





		}



	}

?>