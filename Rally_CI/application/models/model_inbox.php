<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_inbox extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function getMessages(){ 
            echo "string";         

            $you=$this->input->post('froms');
            $he=$this->input->post('tos');
            
            

                  if(strcmp($you , $he)==0){

			return false;


                  }else{

                        $sql = "SELECT * FROM `convertation` WHERE sender ='".$you."' and reciever = '".$he."'";
                        $result=$this->db->query($sql);
                        return $result;

      
                        
                  }

		}

            public function user1(){
                  return $this->input->post('froms');
            }
            public function user2(){
                  return $this->input->post('tos');
            }

            



	}

?>