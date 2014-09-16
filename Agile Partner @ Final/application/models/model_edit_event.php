<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_edit_event extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function update_event(){

			//Assign textbox values to variables 
    		$project=$_SESSION['project'];
            $team=$_SESSION['team'];
            $id=$this->input->post('txtId');
            $name=$this->input->post('txtName');
            $description=$this->input->post('txtDescription');
            $notifyTo=$this->input->post('notifyTo');
            $date=$this->input->post('txtDate');
            $time=$this->input->post('txtTime');
            $createdBy=$_SESSION['email'];

            $sdate = strtotime($date);
            $stime = strtotime($time);

            //remove existing records
            $sql ="SELECT count(id) as cnt FROM events WHERE id='$id'";
            $result=$this->db->query($sql);
            $row = $result->row_array();
            $count=$row['cnt'];

            while($count>0){
                $sql="DELETE FROM events WHERE id='{$id}' LIMIT 1";
                $result=$this->db->query($sql);
                $count=$count-1;
            }

            //Insert data to DB
            if($notifyTo=='all'){

                $result = mysql_query("SELECT userName FROM newteam t WHERE projectName='$project' AND teamId='$team'");
                
                if(mysql_num_rows($result)>0){

                while ($row = mysql_fetch_array($result)) {
                    $notifyTo=$row['userName'];

                    $sql="insert into events (id,name,description,notifyTo,date,time,project,team,createdBy) 
                        values('".$id."',
                         '".$name."',
                         '".$description."',
                         '".$notifyTo."',
                         '".$date."',
                         '".$time."',
                         '".$project."',
                         '".$team."',
                         '".$createdBy."')";

                    $result1=$this->db->query($sql);
                    if($this->db->affected_rows()===1){
                        $this->send_email($name,$description,$date,$time,$notifyTo);
                    }
                    else{
                        //return false;
                    }
                }
                return true;
                }
            }
            else{
                $sql="insert into events (id,name,description,notifyTo,date,time,project,team,createdBy) 
                  values('".$id."',
                         '".$name."',
                         '".$description."',
                         '".$notifyTo."',
                         '".$date."',
                         '".$time."',
                         '".$project."',
                         '".$team."',
                         '".$createdBy."')";

                $result=$this->db->query($sql);

                if($this->db->affected_rows()===1){
                    $this->send_email($name,$description,$date,$time,$notifyTo);
                    return $name;
                }
                else{
                    return false;
                }
            }
        }

        public function send_email($event,$description,$date,$time,$sender){

            $email=$_SESSION['email'];

            $this->load->library('email');
            $this->email->set_mailtype('html');

            $this->email->from($email,$_SESSION['project'].' - '.$event);
            $this->email->to($sender);
            $this->email->subject($event);

            $message='<html>
                          <body bgcolor="#DCEEFC">
                            <center>
                              ===============================<br><br>
                              Project : '.$_SESSION['project'].'<br>
                              Team    : '.$_SESSION['team'].'<br><br>
                              '.$description.' on '.$date.' at '.$time.'<br><br>
                              Event updated by '.$email.'<br><br>
                              Agile Partner<br>
                              <a href="'.base_url().'login'.'">Sign In Now</a><br><br>
                              ===============================<br>
                            </center>
                          </body>
                        </html>';

            $this->email->message($message);

            $this->email->send();
        }
    }
?>