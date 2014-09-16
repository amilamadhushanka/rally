<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class viewImage extends CI_Controller{

		public function __construct(){
			parent::__construct();

			//$this->load->helper('url');
			//$this->load->helper('html');

			$this->load->model('model_view_image');
			session_start();

		}

		public function index(){
			//$this->load->model('model_comment');
			$comments = array();
			//if img_id is set assign values retrieving from db to $d array
			if(isset($_GET['img_id'])	){
				$d = $this->model_view_image->getComments($_GET['img_id']);
				foreach ($d as $row) {
					//assign values from db to comments array
					//$key=>$value
					$comments[]=array('id'=>$row->msg_id, 'comment'=>$row->message, 'userName'=>$row->userName);

				}
				$data = array('comments'=>$comments);

				$this->load->view('view_settings_header');
				$this->load->view('view_viewImage', $data);
			}
			
		}

		

		
	}