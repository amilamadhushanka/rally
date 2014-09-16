<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_view_image extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function getComments($imgID){ 
                  $this->db->select("message, msg_id, userName");
                  $whereCondition =array('img_id' =>$imgID);
                  $this->db->where($whereCondition);
                  $this->db->from('comment');
                  $query = $this->db->get();
                  return $query->result(); //returns a boolean value
            }

            public function insertComment($userName, $img_id, $comment){ 
                  $data = array(
                  'message' => $comment ,
                  'img_id' => $img_id ,
                  'userName' => $userName
                  );

                  $this->db->insert('comment', $data); 
            }

           
            



	}

?>