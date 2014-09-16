<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class NotificationDefect extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_notification_defect');
		}

		public function index(){
			$owner=$_SESSION['email'];
			$project=$_SESSION['project'];
			$query = $this->db->query("SELECT DISTINCT owner,count(id) as cnt FROM defect WHERE owner='$owner' AND project='$project' AND notify=FALSE");
			$data['notify'] = $query->result_array();
			$this->load->view('view_notificationDefect',$data);

			$check_result=$this->model_notification_defect->update($owner,$project);
		}

	}

?>