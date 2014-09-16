<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_add_defect extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function add_defect(){

			//Assign textbox values to variables 
    		$project=$this->input->post('project');
    		$id=$this->input->post('txtId');
    		$name=$this->input->post('txtName');
    		$description=$this->input->post('txtDescription');
    		$owner=$this->input->post('owner');
    		$state=$this->input->post('state');
    		$environment=$this->input->post('environment');
    		$priority=$this->input->post('priority');
    		$severity=$this->input->post('severity');
    		$submittedBy=$_SESSION['email'];
    		$creationDate=$this->input->post('txtCreationDate');
    		$foundIn=$this->input->post('txtFoundIn');
    		$fixedIn=$this->input->post('txtFixedIn');
    		$targetBuild=$this->input->post('txtTargetBuild');
    		$verifiedIn=$this->input->post('txtVerifiedIn');
    		$resolution=$this->input->post('resolution');
    		$targetDate=$this->input->post('txtTargetDate');
    		$affectsDoc='0';
    		$scheduleState=$this->input->post('scheduleState');
    		$blocked='0';
    		$ready='0';
    		$blockedReason='';
    		$iteration=$this->input->post('iteration');
    		$planEstimate=$this->input->post('txtPlanEstimate');
    		$userStory=$this->input->post('userStory');

    		//Check check boxes are selected
    		if(($this->input->post('affectsDoc'))){
      			$affectsDoc = '1';
    		}
    		if(($this->input->post('blocked'))){
      			$blocked = '1';
      			$blockedReason=$this->input->post('txtBlockedReason');
    		}
    		if(($this->input->post('ready'))){
      			$ready = '1';
    		}

            $attachmentStatus=$this->input->post('attachment');
            if($attachmentStatus){
                $attachment =  addslashes(file_get_contents($_FILES['attachment']['tmp_name']));
            }
            else{
                $attachment = false;
            }

    		//Insert data to DB
            if($attachment){
  			   $sql="insert into defect (id,name,description,owner,state,environment,priority,severity,submittedBy,
          			creationDate,foundIn,fixedIn,targetBuild,verifiedIn,resolution,targetDate,affectsDoc,scheduleState,
          			blocked,ready,blockedReason,iteration,planEstimate,project,userStory,attachment) 
          			values('".$id."','".$name."','".$description."','".$owner."','".$state."','".$environment."','".$priority."',
                        '".$severity."','".$submittedBy."','".$creationDate."','".$foundIn."','".$fixedIn."','".$targetBuild."',
                        '".$verifiedIn."','".$resolution."','".$targetDate."','".$affectsDoc."','".$scheduleState."','".$blocked."',
                        '".$ready."','".$blockedReason."','".$iteration."','".$planEstimate."','".$project."','".$userStory."','".$attachment."')";
            }
            else{
                $sql="insert into defect (id,name,description,owner,state,environment,priority,severity,submittedBy,
                    creationDate,foundIn,fixedIn,targetBuild,verifiedIn,resolution,targetDate,affectsDoc,scheduleState,
                    blocked,ready,blockedReason,iteration,planEstimate,project,userStory) 
                    values('".$id."','".$name."','".$description."','".$owner."','".$state."','".$environment."','".$priority."',
                        '".$severity."','".$submittedBy."','".$creationDate."','".$foundIn."','".$fixedIn."','".$targetBuild."',
                        '".$verifiedIn."','".$resolution."','".$targetDate."','".$affectsDoc."','".$scheduleState."','".$blocked."',
                        '".$ready."','".$blockedReason."','".$iteration."','".$planEstimate."','".$project."','".$userStory."')";               
            }
            
          	$result=$this->db->query($sql);
            
			if($this->db->affected_rows()===1){

				return $id;
			}
			else{
				return false;
			}
		}
	}
?>