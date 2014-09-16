<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Track extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->helper('html');
			session_start();
			$this->load->model('model_track');
		}

		public function index(){
		
			$sql ="select distinct i.name from iteration i order by i.name limit 1";
			$result=$this->db->query($sql);
            $row = $result->row_array();
            $iteration=$row['name'];

			$this->loadDetails($iteration,$_SESSION['project']);
		}

		public function loadDetails($iteration,$project){
			$this->load->view('view_header');
			
			//load Defined user stories
			$query = $this->db->query("SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Owner,s.creationDate,u.fName,u.lName,a.iteration FROM userstory s,users u, assign_userstory_to_iteration a 
              							WHERE s.Owner=u.username AND s.sch_state='Defined' AND a.userstory=s.ID AND a.iteration='$iteration' AND s.pname='$project' ORDER BY s.ID ASC");
			$data['defined_us'] = $query->result_array();

			//load Defined defects
			$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,d.iteration FROM defect d,users u 
              							WHERE d.owner=u.username AND d.scheduleState='Defined' AND d.iteration='$iteration'AND d.project='$project'  ORDER BY d.id ASC");
			$data['defined_df'] = $query->result_array();

			//load In-Progress user stories
			$query = $this->db->query("SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Owner,s.creationDate,u.fName,u.lName,a.iteration FROM userstory s,users u, assign_userstory_to_iteration a 
              							WHERE s.Owner=u.username AND s.sch_state='In-Progress' AND a.userstory=s.ID AND a.iteration='$iteration' AND s.pname='$project' ORDER BY s.ID ASC");
			$data['inProgress_us'] = $query->result_array();

			//load In-Progress defects
			$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,d.iteration FROM defect d,users u 
              							WHERE d.owner=u.username AND d.scheduleState='In-Progress' AND d.iteration='$iteration' AND d.project='$project' ORDER BY d.id ASC");
			$data['inProgress_df'] = $query->result_array();

			//load Completed user stories
			$query = $this->db->query("SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Owner,s.creationDate,u.fName,u.lName,a.iteration FROM userstory s,users u, assign_userstory_to_iteration a 
              							WHERE s.Owner=u.username AND s.sch_state='Completed' AND a.userstory=s.ID AND a.iteration='$iteration' AND s.pname='$project' ORDER BY s.ID ASC");
			$data['completed_us'] = $query->result_array();

			//load Completed defects
			$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,d.iteration FROM defect d,users u 
              							WHERE d.owner=u.username AND d.scheduleState='Completed' AND d.iteration='$iteration' AND d.project='$project' ORDER BY d.id ASC");
			$data['completed_df'] = $query->result_array();

			//load Accepted user stories
			$query = $this->db->query("SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Owner,s.creationDate,u.fName,u.lName,a.iteration FROM userstory s,users u, assign_userstory_to_iteration a 
              							WHERE s.Owner=u.username AND s.sch_state='Accepted' AND a.userstory=s.ID AND a.iteration='$iteration' AND s.pname='$project' ORDER BY s.ID ASC");
			$data['accepted_us'] = $query->result_array();

			//load Accepted defects
			$query = $this->db->query("SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,d.iteration FROM defect d,users u 
              WHERE d.owner=u.username AND d.scheduleState='Accepted' AND d.iteration='$iteration' AND d.project='$project' ORDER BY d.id ASC");
			$data['accepted_df'] = $query->result_array();

			//load IterationEnd
			$query = $this->db->query("SELECT endDate,startDate FROM iteration WHERE name='$iteration'");
			$data['IterationEnd'] = $query->result_array();

			//load activeDefects
			$query = $this->db->query("SELECT COUNT(DISTINCT id) as cnt FROM defect WHERE iteration='$iteration' AND project='$project' AND scheduleState!='Accepted'");
			$data['activeDefects'] = $query->result_array();

			//load activeUserstories
			$query = $this->db->query("SELECT COUNT(DISTINCT i.userstory) as cnt FROM assign_userstory_to_iteration i,userstory s WHERE i.iteration='$iteration' AND i.project='$project' AND s.sch_state!='Accepted' AND i.userstory=s.ID");
			$data['activeUserstories'] = $query->result_array();

			//load loadIterations
			$query = $this->db->query("SELECT DISTINCT name from iteration where name!='$iteration'");
			$data['iterations'] = $query->result_array();

			//selected iteration
			$data['iteration'] =$iteration;

			//selected project
			$data['project'] =$project;

			//$this->load->view('view_track', array('selected_iteration' =>$iteration));
			$this->load->view('view_track',$data);
		}

		public function moveToInProgress($id,$iteration,$project){
			
			$category = explode("-", $id);
            $value=$category[0];

            if ($value=='US') {
            	$result=$this->model_track->moveUserStoryToInProgress($id);

            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh');
					$this->loadDetails($iteration,$project); 
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }

            elseif ($value=='DF') {
            	$result=$this->model_track->moveDefectToInProgress($id);

            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh');
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
			
		}

		public function moveToDefined($id,$iteration,$project){

			$category = explode("-", $id);
            $value=$category[0];

            if ($value=='US') {
            	$result=$this->model_track->moveUserStoryToDefined($id);

            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
            elseif ($value=='DF') {
            	$result=$this->model_track->moveDefectToDefined($id);
            	
            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
		}

		public function moveToCompleted($id,$iteration,$project){

			$category = explode("-", $id);
            $value=$category[0];

            if ($value=='US') {
            	$result=$this->model_track->moveUserStoryToCompleted($id);

            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
            elseif ($value=='DF') {
            	$result=$this->model_track->moveDefectToCompleted($id);
            	
            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
		}

		public function moveToAccepted($id,$iteration,$project){

			$category = explode("-", $id);
            $value=$category[0];

            if ($value=='US') {
            	$result=$this->model_track->moveUserStoryToAccepted($id);

            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
            elseif ($value=='DF') {
            	$result=$this->model_track->moveDefectToAccepted($id);
            	
            	if($result){
					//$url="http://localhost/Rally_CI/track/loadDetails/".$iteration;
					//redirect($url, 'refresh'); 
					$this->loadDetails($iteration,$project);
				}
				else{
					echo 'Sorry, there is a problem with the web site.';
				}
            }
		}

	}

?>