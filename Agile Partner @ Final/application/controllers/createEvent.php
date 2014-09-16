<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class CreateEvent extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			if ($_SESSION['teamRole']!='Scrum Master') exit('access denied for user '.$_SESSION['email']);
		}

		public function index(){

			$this->load->library('form_validation');
			//set rules
			$this->form_validation->set_rules('txtName','Name','required|xss_clean');

			if($this->form_validation->run()==FALSE){
				//User didn't validate. Send back to create iteration page and show errors.
				$project=$_SESSION['project'];
				$team=$_SESSION['team'];

				//get team members
				$query = $this->db->query("SELECT t.userName,u.fName,u.lName FROM newteam t,users u WHERE t.projectName='$project' AND t.teamId='$team' AND u.username=t.userName");
				$data['teamMembers'] = $query->result_array();

				$id=$this->getEventId();
				$data['eventId'] =$id;
				$this->load->view('view_createEvent',$data);
			}
			else{
				//Successful validation

				$this->load->model('model_create_event');

				$result=$this->model_create_event->create_event();

				if($result){
					echo "<script>alert('Event created successfully.')</script>";
					redirect('http://agilepartner.comxa.com/index.php/createEvent', 'refresh'); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
				
			}
		}

		private function getEventId(){
      
      		$result = mysql_query("select * from events");

      		if(mysql_num_rows($result)>0){
        		$array = array();

        		while ($row = mysql_fetch_array($result)) {
          			$num = explode("-", $row['id']);
          			array_push($array,$num[1]);
        		}

        		$max=max($array);
        		return "EV-".++$max;
      		}
      		else{
        		return "EV-1";
      		}
  		}


	}

?>