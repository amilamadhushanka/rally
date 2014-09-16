<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_notification_defect extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function update($owner,$project){
         
            $query="SELECT DISTINCT id,owner FROM defect WHERE owner='$owner' AND project='$project' AND notify=FALSE";
            $result=mysql_query($query);
            while($row = mysql_fetch_array($result)){

                $sql="UPDATE defect SET notify=TRUE WHERE owner='{$owner}' AND project='{$project}'"; 
                $result=$this->db->query($sql);

                if($this->db->affected_rows()===1){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }
?>