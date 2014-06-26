<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Track extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');

		}

		public function index(){
			$sql ="select distinct a.iteration from iteration i,assign_defect_to_iteration a where i.name=a.iteration order by a.iteration limit 1";
			$result=$this->db->query($sql);
            $row = $result->row_array();
            $iteration=$row['iteration'];
			$this->load->view('view_track', array('selected_iteration' =>$iteration));
		}

		public function loadDetails($iteration){
			$this->load->view('view_track', array('selected_iteration' =>$iteration));
		}

		public function moveToInProgress($id,$iteration){
			$this->load->model('model_track');

			$result=$this->model_track->moveToInProgress($id);

			if($result){
				$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
				redirect($url, 'refresh'); 
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

		public function moveToDefined($id,$iteration){
			$this->load->model('model_track');

			$result=$this->model_track->moveToDefined($id);

			if($result){
				$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
				redirect($url, 'refresh'); 
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

		public function moveToCompleted($id,$iteration){
			$this->load->model('model_track');

			$result=$this->model_track->moveToCompleted($id);

			if($result){
				$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
				redirect($url, 'refresh');
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

		public function moveToAccepted($id,$iteration){
			$this->load->model('model_track');

			$result=$this->model_track->moveToAccepted($id);

			if($result){
				$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
				redirect($url, 'refresh'); 
			}
			else{
				echo 'Sorry, there is a problem with the web site.';
			}
		}

	}

?>