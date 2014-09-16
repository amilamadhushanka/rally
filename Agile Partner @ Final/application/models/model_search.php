<?php
class model_search extends CI_Model {

	
	function getEmployee($search, $v){
		if($v=="1"){
			$this->db->select("name");
			$whereCondition =array('name' =>$search);
			$this->db->where($whereCondition);
			$this->db->from('project');
			$query = $this->db->get();
			return $query->result();
		}
		else if($v=="2"){
			$this->db->select("username as name");
			$whereCondition =array('fName' =>$search);
			$this->db->where($whereCondition);
			$this->db->from('users');
			$query = $this->db->get();
			return $query->result();
		}
		else if($v=="3"){
			return null;
		}
	}

	function getProjects($search)
	{
			$sql1="SELECT p.name,p.discription,p.state,p.owner,p.timezone,p.date_format,p.date_time_format,p.workdays,p.changest,p.user_story,p.defect,p.tasks,t.teamId
		FROM project p, newteam t WHERE p.name='$search' AND p.name=t.projectName"; 

		$result1=$this->db->query($sql1);
		return $result1;

            //$search=  $this->input->post('search');
          //  var_dump($search);
           // return $this->db->get_where('project',array('name'=>$search));

	}

	function getUserDetails($serach)
	{

			return $this->db->get_where('users',array('fName'=>$search));

	}
}
?>