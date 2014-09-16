<?php
class Model_get_search_value extends CI_Model {

	

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

	function getUsers($search)
	{

			$sql2="SELECT * FROM users u WHERE u.fName='$search'";
			$result2=$this->db->query($sql2);
			return $result2;

           //return $this->db->get_where('users',array('fName'=>$search));

	}


}
?>