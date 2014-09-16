<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_message extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function sendMessage(){          

            $from=$this->input->post('from');
            $to=$this->input->post('to');
            $message = $this->input->post('txtmessage');
            //$date = ->input->post('');
            $date = " "; //date('l, F jS, Y');

            


                  if(strcmp($from , $to)==0){

			return false;


                  }else{
                        $sql = "insert into convertation(sender,reciever,messages) values ('".$from."','".$to."','".$message."')";
                        $result=$this->db->query($sql);

      
                  if($this->db->affected_rows()==1){
                              return true;
                  }else{
                        return false;
                  }
                  }





		}



	}

?>