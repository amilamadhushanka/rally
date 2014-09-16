<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ViewTestcase extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function load_Testcase($iName,$uid,$tcid){
			$sql =$this->db->query("SELECT * from testcase where IterationName ='$iName' AND USid='$uid' AND TC_id='$tcid'");
			return $sql->result();
		}

		public function get_values($iName,$uid,$tcid){
			$data['result']=$this->load_Testcase($iName,$uid,$tcid);
			$this->load->view('view_header');
			$this->load->view('view_testcaseDetails',$data);
		}
	}

?>