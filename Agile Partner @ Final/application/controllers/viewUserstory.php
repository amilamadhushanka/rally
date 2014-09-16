<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ViewUserstory extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function load_userstory($id){
			$sql =$this->db->query("SELECT * from userstory where ID ='$id'");
			return $sql->result();
		}

		public function get_values($id){
			$data['result']=$this->load_userstory($id);
			$this->load->view('view_header');
			$this->load->view('view_userstoryDetails',$data);
		}
	}

?>