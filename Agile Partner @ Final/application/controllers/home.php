<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Home extends CI_Controller{

		//private $logged_in;

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){

			$project=$_SESSION['project'];
			$user=$_SESSION['email'];
			
			$query = $this->db->query("SELECT DISTINCT owner,count(id) as cnt FROM defect WHERE owner='$user' AND project='$project' AND notify=FALSE");
			$data['notifyCount'] = $query->result_array();

			$today=date("Y-m-d");
			$query = $this->db->query("SELECT DISTINCT notifyTo,count(id) as cnt FROM events WHERE notifyTo='$user' AND date='$today' AND notify=FALSE");
			$data['eventNotifyCount'] = $query->result_array();

			$this->load->view('view_header');
			$this->load->view('view_home',$data);
		}

	}

?>