
<?php

class GetUs_model extends CI_Model
{

	function add_us(){
      	$uid=$this->input->post('uid');
		$uname=$this->input->post('uname');
		$tags=$this->input->post('tags');
		$description=$this->input->post('description');
		$owner=$this->input->post('owner');
		$plan_estima=$this->input->post('planEstima');
		$priority=$this->input->post('priority');
		$pname =$this->input->post('project');
		$Rank=$this->input->post('rank');
		$state=$this->input->post('state');
		$iteration=$this->input->post('iteration');
		$ready=$this->input->post('ready');
		$blocked=$this->input->post('blocked');
		$blockedReason=$this->input->post('txtBlockedReason');

		$sql="INSERT INTO userstory (ID,Name,Tag,Discription,Owner,Plan_estima,Priority,Rank,pname,state,iteration,ready,blocked,blockedReason) 
		VALUES ('".$uid."',
				 '".$uname."',
				 '".$tags."',
				 '".$description."',
				 '".$owner."',
				 '".$plan_estima."',
				 '".$priority."',
				 '".$Rank."',
				 '".$pname."',
				 '".$state."',
				 '".$iteration."',
				 '".$ready."',
				 '".$blocked."',
				 '".$blockedReason."')";

		$sql_1="INSERT INTO assign_userstory_to_iteration(iteration,userstory,project) values('".$iteration."','".$uid."','".$pname."')";

		$result=$this->db->query($sql);

		if($iteration!='unscheduled'){
            $result_1=$this->db->query($sql_1);
        }

		if($this->db->affected_rows()===1){

			return true;
		}
		else{
			return false;
		}
    }


}