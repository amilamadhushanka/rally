<!DOCTYPE html>

<?php

if (isset($_POST['load'])) {


	$t = $_POST['projectname'];
	echo $t;
}

?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Assign Unassign task</title>

	


</head>
<body>
<form role = "form" method = "post" action = "/Rally_CI/index.php/Assign_UnAssignTask/index">
<div id="container">

<table align = "center" border="0" style="width:auto" >
  	<col width="200">
  	<col width="500">

<?php 
    foreach ($arr as $row) 
    {
      $project_name=$row->project_name;
      $user_story=$row->user_story;
      $Task_name=$row->task_name;
      $description=$row->description;
      
      $estimated_time=$row->estimated_time;
      $to_do=$row->to_do;
      $ready=$row->ready;
      $blocked=$row->blocked;
      $blocked_reason=$row->blocked_reason;
    }
   
  ?>


  	<tr>
   		<td>
    		<h3>Assign Unassign Task</h3>
    	</td>
  	</tr>


  	<tr>
  		<td bgcolor="#D8DFE6" colspan="4"> General  </td>
   	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>


	<tr>
		<td bgcolor="#F0F8FF"><label> Project Name: </label></td>

		<td><input type="text" id="projectname" name="projectname"  style="width:450px" value="<?php echo $project_name; ?>"readonly > </td> 
		 

	</tr>
	
	<tr>
		<td bgcolor="#F0F8FF"><label> User Story: </label></td>
		<td><input type="text" id="userstory" name="userstory"  style="width:450px" value="<?php echo $user_story; ?>"readonly > </td> 
		 
	</tr>
	<tr>
  		<td bgcolor="#D63030"><label> Task Name: </label></td>
  		<td><input type="text" id="task" name="task"  style="width:450px" value="<?php echo $Task_name; ?>"readonly > </td> 
  		
	</tr>

	</tr>

	<tr>
		<td bgcolor="#F0F8FF"><label> Description: </label></td>
		 <td><textarea name="description" rows="10" cols="80" class= "input" style="width:450;overflow:auto" id="_random_id_9" 
		 	><?php echo $description; ?></textarea> 
		 </td>
	</tr>


  <tr>
    <td bgcolor="#F0F8FF"><label> Owner: </label></td>
     <td>
     <select name ="owner" style="width:450px" value="<?php echo set_select('owner');?>">
      <?php
      mysql_select_db(rally);
      $sql_data = "SELECT username FROM  users";

            $result_data = mysql_query($sql_data);
  
        
      while($row_data = mysql_fetch_array($result_data))
        {
          echo "<option value='".$row_data['username']."'>".$row_data['username']."</option>";
        }
      
      ?>
      </select>
     </td>
  </tr>

	<!--<tr>
		<td bgcolor="#F0F8FF"><label> Owner: </label></td>
		<td><input type="text" id="owner" name="owner"  style="width:450px" value="<?php echo $owner; ?>"readonly > </td> 
		
	</tr>-->

	<tr >
        <td >&nbsp;</td>
	</tr>

	<tr>
  		<td bgcolor="#D8DFE6" colspan="4"> Task  </td>
   	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>

	<tr>
  		<td bgcolor="#F0F8FF"><label> Estimated Time: </label></td>
  		<td><input type="text" id="Time" name="time"  style="width:200px" value="<?php echo $estimated_time; ?>" > Hours</td> 


	</tr>
	<tr>
  		<td bgcolor="#F0F8FF"><label> To Do: </label></td>
  		<td><input type="text" id="ToDo" name="toDo"  style="width:200px" value="<?php echo $to_do; ?>" > Hours</td> 

	</tr>

	<tr>
  		<td bgcolor=" #F0F8FF"> <label> Ready </label></td>
  		<td><input type="checkbox"  name="ready" value="1"<?php if($ready=='1') {echo 'checked="checked"';}else {echo '';}?>/></td> 
	</tr>
	
	<tr>
  		<td bgcolor=" #F0F8FF"> <label> Blocked </label></td>
 		<td><input type="checkbox"  name="blocked" value="1"<?php if($blocked=='1') {echo 'checked="checked"';}else {echo '';}?>/></td> 
 
	</tr>

	<tr>
  		<td bgcolor="#F0F8FF"><label> Blocked Reason: </label></td>
  		<td><input type="text" id="Blocked" name="blockedreason"  style="width:450px" value="<?php echo $blocked_reason; ?>" > </td> 

	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>

	<tr>  
  		<td>
  		</td>
  		<td>
    	<button style="width:120px" name="save">Save</button>
    	
    	<button style="width:98px" name="cancel" onclick="window.close()">Cancel</button>
  		</td>
	</tr>


</table>
<center>
    <?php echo validation_errors('<p style="color: red;">');?>
</center>

</div>
</form>
</body>
</html>