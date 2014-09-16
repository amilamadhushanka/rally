<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class NotificationEvent extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_notification_event');
		}

		public function index(){
			$owner=$_SESSION['email'];

			date_default_timezone_set ("Asia/Colombo"); 
			$today=date("Y-m-d");

			$query = $this->db->query("SELECT DISTINCT notifyTo,name,description,date,time,project FROM events WHERE notifyTo='$owner' AND date='$today' AND notify=FALSE");
			$row = $query->row_array();

			if($row){
				$time=strtotime($row['time']);
				$time1=date("h:i a",$time);
				$notify = '<div style="width:250px;"><center>Project : '.$row['project'].'<br>'.$row['description'].'<br>at '.$time1.' </center></div>';
				echo $notify;
			}
		}

		public function time(){
			$owner=$_SESSION['email'];

			date_default_timezone_set ("Asia/Colombo"); 
			$today=date("Y-m-d");
			$currentTime=date("H:i",time());	

			$query = $this->db->query("SELECT COUNT(id) as cnt FROM events WHERE notifyTo='$owner' AND date='$today' AND time='$currentTime' AND notify=FALSE");
			$row = $query->row_array();
			if($row){
				$count=$row['cnt'];
				echo $count;
			}
		}

		public function notifyOnTime(){
				
			$owner=$_SESSION['email'];
			date_default_timezone_set ("Asia/Colombo"); 
			
			$today=date("Y-m-d");
			
			$currentTime=date("H:i",time());

				$query = $this->db->query("SELECT DISTINCT id,notifyTo,name,description,date,time,project FROM events WHERE notifyTo='$owner' AND date='$today' AND time='$currentTime' AND notify=FALSE");
				$row = $query->row_array();

				if($row){
					date_default_timezone_set ("Asia/Colombo");
					$time=strtotime($row['time']);
					$time1=date("h:i a",$time);

					$notify = '<div style="width:250px;"><center>Project : '.$row['project'].'<br>'.$row['description'].'<br>at '.$time1.' </center></div>';
					
					$eventId=$row['id'];
					$result=$this->model_notification_event->update($eventId,$owner);
					
					if($result){
						echo $notify;
					}
				}
		}

	}

?>