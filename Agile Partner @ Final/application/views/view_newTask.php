<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>Create new task</title>

	<?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>


</head>
<body>
<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/newtask">
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
  		<td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
   	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>


	<tr>
		<td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
		 <td>
		 	<input type="text" id="Task" name="projectname"  style="width:450px" value="<?php echo $_SESSION['project'];?>" readonly>
		 </td>
	</tr>
	
	<tr>
		<td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> User Story : &nbsp;</label></td>
		<td>
     <select name ="userstory" style="width:450px" value="<?php echo set_select('userstory');?>">
		<option value="" selected="true" style="display:none;">«Select Userstory»</option>
		 	<?php
		 	echo $sql_data = "SELECT Name FROM userstory WHERE pname = '".$_SESSION['project']."'";
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
  		<td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Task Name : &nbsp;</label></td>
  		<td><input type="text" id="Task" name="task"  style="width:450px" value="<?php echo set_value('task');?>"> </td> 

	</tr>

	<tr>
		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Description : &nbsp;</label></td>
		 <td><textarea name="description" rows="10" cols="80" class= "input" style="width:450;overflow:auto" id="_random_id_9" value="<?php echo set_value('description');?>"></textarea> 
		 </td>
	</tr>

	<tr>
		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Owner : &nbsp;</label></td>
		 <td>
     <select name ="owner" style="width:450px" value="<?php echo set_select('owner');?>">
     	<option value="" selected="true" style="display:none;">«Select Owner»</option>
		 	<?php
		 	$sql_data = "SELECT userName FROM  newteam WHERE projectName = '".$_SESSION['project']."'";

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
  		<td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Task</font></td>
   	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>

	<tr>
  		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Estimated Time : &nbsp;</label></td>
  		<td><input type="text" id="Time" name="time"  style="width:200px" value="<?php echo set_value('time');?>"> Hours</td> 

	</tr>

	<tr>
  		<td bgcolor="#D8DFE6" style="text-align:right;"><label> To Do : &nbsp;</label></td>
  		<td><input type="text" id="ToDo" name="toDo"  style="width:200px" value="<?php echo set_value('toDo');?>"> Hours</td> 

	</tr>

	<tr>
  		<td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Ready : &nbsp;</label></td>
  		<td><input type="checkbox"  name="ready" value="ready"  <?php echo set_checkbox('ready', 'ready'); ?>></td> 
	</tr>
	
	<tr>
  		<td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Blocked : &nbsp;</label></td>
 		<td><input type="checkbox"  name="blocked" value="blocked"  <?php echo set_checkbox('blocked', 'blocked'); ?>></td> 
	</tr>

	<tr>
  		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Blocked Reason : &nbsp;</label></td>
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