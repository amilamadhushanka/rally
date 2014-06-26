<!DOCTYPE html>

<?php

if (isset($_POST['load'])) {


	$t = $_POST['projectname'];
	
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

    <title>Create new task</title>

	


</head>
<body>
<form role = "form" method = "post" action = "newtask">
<div id="container">

<table align = "center" border="0" style="width:auto" >
  	<col width="200">
  	<col width="500">

  	<tr>
   		<td>
    		<h3>Create Task</h3>
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
		 <td>
     <select name ="projectname" style="width:450px" value="<?php echo set_select('projectname');?>">
		 	<?php
			$con = mysql_connect("localhost","root","")or die("cannot connect");
     		if (!$con)   
        	{     
            die('Could not connect: ' . mysql_error());   
        	}  


		 	mysql_select_db(rally);
		 	$sql_data = "SELECT name FROM project";
      		$result_data = mysql_query($sql_data);

		 			 	
 			while($row_data = mysql_fetch_array($result_data))
				{
					echo "<option value='".$row_data['name']."'>".$row_data['name']."</option>";
				}
			$Projectname=$_POST['projectname'];
			
			
		
		?>
    </select>
		 </td>

	<td>
		<button style="width:120px" name="load">Load</button>
	</td>
	</tr>
	
	<tr>
		<td bgcolor="#F0F8FF"><label> User Story: </label></td>
		 <td>
     <select name ="userstory" style="width:450px" value="<?php echo set_select('userstory');?>">
		 	<?php
		 	mysql_select_db(rally);
		 	echo $sql_data = "SELECT Name FROM userstory WHERE pname = '".$t."'";

          	$result_data = mysql_query($sql_data);

		 	 	
  			
 			while($row_data = mysql_fetch_array($result_data))
				{
					echo "<option value='".$row_data['Name']."'>".$row_data['Name']."</option>";
				}
			
			?>
      </select>
		 </td>
	</tr>

	<tr>
  		<td bgcolor="#D63030"><label> Task Name: </label></td>
  		<td><input type="text" id="Task" name="task"  style="width:450px" value="<?php echo set_value('task');?>"> </td> 

	</tr>

	<tr>
		<td bgcolor="#F0F8FF"><label> Description: </label></td>
		 <td><textarea name="description" rows="10" cols="80" class= "input" style="width:450;overflow:auto" id="_random_id_9" value="<?php echo set_value('description');?>"></textarea> 
		 </td>
	</tr>

	<tr>
		<td bgcolor="#F0F8FF"><label> Owner: </label></td>
		 <td>
     <select name ="owner" style="width:450px" value="<?php echo set_select('owner');?>">
		 	<?php
		 	mysql_select_db(rally);
		 	$sql_data = "SELECT userName FROM  newteam WHERE projectName = '".$t."'";

          	$result_data = mysql_query($sql_data);
 	
  			
 			while($row_data = mysql_fetch_array($result_data))
				{
					echo "<option value='".$row_data['userName']."'>".$row_data['userName']."</option>";
				}
			
			?>
      </select>
		 </td>
	</tr>

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
  		<td><input type="text" id="Time" name="time"  style="width:200px" value="<?php echo set_value('time');?>"> Hours</td> 

	</tr>

	<tr>
  		<td bgcolor="#F0F8FF"><label> To Do: </label></td>
  		<td><input type="text" id="ToDo" name="toDo"  style="width:200px" value="<?php echo set_value('toDo');?>"> Hours</td> 

	</tr>

	<tr>
  		<td bgcolor=" #F0F8FF"> <label> Ready </label></td>
  		<td><input type="checkbox"  name="ready" value="ready"  <?php echo set_checkbox('ready', 'ready'); ?>></td> 
	</tr>
	
	<tr>
  		<td bgcolor=" #F0F8FF"> <label> Blocked </label></td>
 		<td><input type="checkbox"  name="blocked" value="blocked"  <?php echo set_checkbox('blocked', 'blocked'); ?>></td> 
	</tr>

	<tr>
  		<td bgcolor="#F0F8FF"><label> Blocked Reason: </label></td>
  		<td><input type="text" id="Blocked" name="blockedreason"  style="width:450px" value="<?php echo set_value('blockedreason');?>"> </td> 

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