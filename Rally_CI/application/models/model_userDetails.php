<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    class Model_editProject extends CI_Model{
        
        public function __construct(){
            parent::__construct();
        }

        public function load_details(){
            $name=this->input->post('select_project');

        }

        public function sendMessage(){          

            $name=$this->input->post('projectname');
            $discription1=$this->input->post('description');
            $discription = str_replace(' ','',$discription1);

            $state = $this->input->post('txtState');
            $owner=$this->input->post('txtowner');
            $timezone=$this->input->post('txttimezone');
            $date_format = $this->input->post('txtdateFormat');
            $date_and_time_formate=$this->input->post('txtdateTimeFormat');
    
            $chksuday = "0";
            $chkmonday = "0";
            $chktuesday = "0";
            $chkwednessday = "0";
            $chkthursday = "0";
            $chkfriday = "0";
            $chksaturday = "0";

            $changest = "0";

            $user_story=$this->input->post('txtUserStory');
            $defects=$this->input->post('txtDfect');
            $task=$this->input->post('txtTask');

            if ($this->input->post('check_state'))                 { $state = $this->input->post('state'); }
            if ($this->input->post('check_owner'))                 { $owner=$this->input->post('owner');   }
            if ($this->input->post('checktimezone'))               { $timezone=$this->input->post('timezone'); }
            if ($this->input->post('checkdate_formate'))           { $date_format = $this->input->post('date_formate');}
            if ($this->input->post('check_date_and_time_formate')) {$date_and_time_formate=$this->input->post('date_and_time_formate'); }

            if($this->input->post('check_sunday'))   { $chksuday = "1"; }
            if($this->input->post('check_monday'))   { $chkmonday = "1";}
            if($this->input->post('check_tuesday'))  { $chktuesday = "1";}
            if($this->input->post('check_wednesday')){ $chkwednessday = "1";}
            if($this->input->post('check_thursday')) { $chkthursday = "1";}
            if($this->input->post('check_friday'))   { $chkfriday = "1";}
            if($this->input->post('check_saturday')) { $chksaturday = "1";}

            $week =  $chksuday . $chkmonday . $chktuesday . $chkwednessday . $chkthursday . $chkfriday . $chksaturday;

            if ($this->input->post('changest')) { $changest = "1"; }          

            $sql="UPDATE project SET discription='{$discription}',state='{$state}',owner='{$owner}',timezone='{$timezone}',date_format='{$date_format}',date_time_format='{$date_and_time_formate}',workdays='{$week}', changest='{$changest}', user_story='{$user_story}',defect='{$defects}',tasks='{$task}' WHERE name='{$name}' LIMIT 1"; 
                      
            $result=$this->db->query($sql);

            if($this->db->affected_rows()==1){
                return true;
            }else{
                return false;
            }

        }

    }





/*



$username ="";
$email ="";
$fname ="";
$lname ="";
$phone ="";
$country ="";
$assignedProject ="";
$teamId ="";
$onGoingUserStory ="";
$startedDate ="";
$message ="";





if(isset($_POST['Load']))
{

        $email = $_POST['txtuserDetails'];


        $con = mysql_connect("localhost","root", "");
        mysql_select_db("rally", $con);   
        if (!$con)   
        {     
            die('Could not connect: ' . mysql_error());   
        }
        $query = "select * FROM users where username = '$email'";
        $query1 = "select * FROM newteam where userName = '$email'";

        //DAta retriving from users table
        if(mysql_query($query) && mysql_query($query1))
            {
                $result = mysql_query($query);
                $row = mysql_fetch_array($result);

                $username = $row[0];
                $fname = $row[1];
                $lname = $row[2];
                $phone = $row[4];
                $country = $row[7];


                $result1 = mysql_query($query1);
                $row1 = mysql_fetch_array($result1);

                $teamId = $row1[0];
                $assignedProject = $row1[1];
                
                
                
                mysql_close();
            }
        else if(!mysql_query($query) && !mysql_query($query1))
            {
                echo "<script type='text/javascript'>\n";
                echo "alert('Loading faild');\n"; 
                echo "</script>"; 
                mysql_close();
            }

}

if(isset($_POST['send']))
{

  $con = mysql_connect("localhost","root", "");
        mysql_select_db("rally", $con);   
        if (!$con)   
        {     
            die('Could not connect: ' . mysql_error());   
        }


        $email = $_POST['txtuserDetails'];
        $message = $_POST['txtmessage'];
        $dateAndTime = date('Y-m-d H:i:s');
        


        $query = "insert into message ( userId, message, dateNtime) values( '$email', '$message','$dateAndTime')";
       
        //Sending data to message table
        if(mysql_query($query))
            {
                echo "<script type='text/javascript'>\n";
                echo "alert('Message Sent');\n"; 
                echo "</script>"; 
                mysql_close();

            }

            else if(!mysql_query($query))
            {
                echo "<script type='text/javascript'>\n";
                echo "alert('Sending faild');\n"; 
                echo "</script>"; 
                mysql_close();
            }




}

if(isset($_POST['close']))
{

 echo "<script language=javascript>\n".
      " alert('Mail sent successfully');\n".
      " window.close();\n".
      "<script>\n";
      exit();
}

