<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class Model_plan extends CI_Model{
		
		public function __construct(){
			parent::__construct();
		}

		public function loadIterations(){

   			$sql = "SELECT * FROM iteration ORDER BY name ASC";
    		$result=$this->db->query($sql);
    		$row=$result->row();

    		echo '<div class="datagrid" style="width:600px">
          			<table id="iterationTable">
            		<thead>
            			<tr>
              				<th width="70%">Name</th>
              				<th width="10%">Start Date</th>
              				<th width="10%">End Date</th>
              				<th width="5%">Days</th>
              				<th width="5%">Planned Velocity</th>
            			</tr>
            		</thead>';

    		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      			echo "<tbody><tr class='alt'><td>" . $row->name . "</td><td>" . $row->startDate . "</td><td>" . $row->endDate . "</td>
            	<td>" . $row->days . "</td><td>" . $row->PlannedVelocity . "</td></tr></tbody>";  //$row['index'] the index here is a field name
    		}

    		echo "</table>
          		<div>";
    }

  public function getVelocity($project){
    //$project=$this->input->post('selected_project');
    $sql = "SELECT name,PlannedVelocity FROM iteration WHERE project='$project' ORDER BY PlannedVelocity ASC";
    $this->db->select();
    $query = $this->db->get('iteration');
     
    if ($query->num_rows > 0) {
      return $query->result();
    }
    else {
      return FALSE;
    }
  }
  

}

?>