<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_notification_event extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function update($id,$notifyTo){
         
            $sql="UPDATE events SET notify=TRUE WHERE id='{$id}' AND notifyTo='{$notifyTo}'"; 
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