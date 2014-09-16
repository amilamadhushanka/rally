<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class DeleteEvent extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function delete(){

			$this->load->library('form_validation');

			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create addDefect page and show errors.
				$this->load->view('view_deleteEvent');
			}
			else{
				//Successful validation

				$this->load->model('model_delete_event');

				$result=$this->model_delete_event->delete_event();

				if($result){
					echo "<script>alert('Event removed successfully!')</script>";
					redirect('http://agilepartner.comxa.com/index.php/events', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		public function load_event($id){
			$sql =$this->db->query("SELECT * from events where id ='$id'");
			return $sql->result();
		}

		public function get_values($id){

			$data['result']=$this->load_event($id);

			$query = $this->db->query("SELECT count(id) as cnt FROM events WHERE id='$id'");
            $data['notifyCount']=$query->result_array();

            //get team members
            $project=$_SESSION['project'];
			$team=$_SESSION['team'];
			$query = $this->db->query("SELECT t.userName,u.fName,u.lName FROM newteam t,users u WHERE t.projectName='$project' AND t.teamId='$team' AND u.username=t.userName");
			$data['teamMembers'] = $query->result_array();

			$this->load->view('view_header');
			$this->load->view('view_deleteEvent',$data);
		}
	}

?>