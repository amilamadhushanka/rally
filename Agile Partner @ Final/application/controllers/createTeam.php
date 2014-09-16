<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class CreateTeam extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
		}

		public function index(){
			$sql ="select distinct t.teamId from newteam t order by t.teamId limit 1";
			$result=$this->db->query($sql);
            $row = $result->row_array();
            $team=$row['teamId'];

			$this->load->view('view_settings_header');
			$this->load->view('view_createTeam', array('selected_team' =>$team));
		}

		public function loadDetails($team){
			$this->load->view('view_settings_header');
			$this->load->view('view_createTeam', array('selected_team' =>$team));
		}
	}

?>