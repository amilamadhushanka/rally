<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_addDefect extends CI_Model{
		
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
    		$submittedBy=$this->input->post('submittedBy');
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

    /*    
        //send attachment to the database

        // Get important information about the file and put it into variables
        $fileName = $_FILES['attachment']['name'];
        $tmpName  = $_FILES['attachment']['tmp_name'];
        $fileSize = $_FILES['attachment']['size'];
        $fileType = $_FILES['attachment']['type'];

        // get the content of the file into a variable
                    
        $fp = fopen($tmpName, 'r');
        $content = fread($fp, filesize($tmpName));
        $content = addslashes($content);
        fclose($fp);

        if(!get_magic_quotes_gpc()){
          $fileName = addslashes($fileName);
        }
                    
        //$file_info = pathinfo($_FILES['file']['name']);

        $sql_attach = "INSERT INTO deffectattachments SET data = '".$content."'";           
        $result=$this->db->query($sql_attach);
    */

    		//Insert data to DB
  			$sql="insert into defect (id,name,description,owner,state,environment,priority,severity,submittedBy,
          			creationDate,foundIn,fixedIn,targetBuild,verifiedIn,resolution,targetDate,affectsDoc,scheduleState,
          			blocked,ready,blockedReason,iteration,planEstimate,project,userStory) 
          			values('".$id."','".$name."','".$description."','".$owner."','".$state."','".$environment."','".$priority."',
                        '".$severity."','".$submittedBy."','".$creationDate."','".$foundIn."','".$fixedIn."','".$targetBuild."',
                        '".$verifiedIn."','".$resolution."','".$targetDate."','".$affectsDoc."','".$scheduleState."','".$blocked."',
                        '".$ready."','".$blockedReason."','".$iteration."','".$planEstimate."','".$project."','".$userStory."')";
		
            $sql_1="insert into assign_defect_to_iteration(iteration,defect,project) values('".$iteration."','".$id."','".$project."')";

          	$result=$this->db->query($sql);
            
            if($iteration!='unscheduled'){
                $result_1=$this->db->query($sql_1);
            }

			if($this->db->affected_rows()===1){

				return $id;
			}
			else{
				return false;
			}
		}
	}
?>