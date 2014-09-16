<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AddComment extends CI_Controller{

		public function __construct(){
			parent::__construct();

			//$this->load->helper('url');
			//$this->load->helper('html');

			$this->load->model('model_viewImage');
			session_start();

		}

		public function index(){
		//post values taken from model_viewImage
			if(isset($_POST['comment'])){
				?>

				<li>

					<?php 
					$this->model_viewImage->insertComment($_POST['userName'], $_POST['img_id'], $_POST['comment']);
					echo $_POST['userName']. "</br>" . $_POST['comment'] ; ?>
				</li>

				<?php
			}

		}
	}