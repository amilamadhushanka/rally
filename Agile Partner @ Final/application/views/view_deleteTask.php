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

    <title>Delete Task</title>

	  <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/viewTasks";
        window.location.assign(url);
      }
    </script>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
      function notify(){
      $(document).ready(function () {
        var options1={
          color:'red',
          target: $('#eventPosition'),
          position: {
            x: 'left',
            y: 'top'
          },
          outside: 'x',
          ajax: 'http://agilepartner.comxa.com/index.php/notificationEvent/notifyOnTime',
           reload: true,
          adjustPosition: true,
          adjustTracker: true,
          autoClose:false,
        };
        new jBox('Notice',options1);
      });
    }
    </script>
    
    <script type="text/javascript">
      setInterval(function(){  
      $.ajax({
      type: 'GET',
      url: 'http://agilepartner.comxa.com/index.php/notificationEvent/time',  
      cache: false,
      dataType: 'html',
      success: function(notifications) { 
      var data = notifications;  
        if(data=='1'){
          notify();
        }
      },
      error : function(er){
        //alert("error");
      }
      }); 
      }

      ,4000);
    </script>


</head>
<body>
  <label id="eventPosition" style="margin-left: 1350px;"></label>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/deleteTask/index">
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
      $owner=$row->owner;
      $estimated_time=$row->estimated_time;
      $to_do=$row->to_do;
      $ready=$row->ready;
      $blocked=$row->blocked;
      $blocked_reason=$row->blocked_reason;
    }
   
  ?>


  	<tr>
   		<td>
    		<h3>Delete Task</h3>
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

		<td><input type="text" id="projectname" name="projectname"  style="width:450px" value="<?php echo $project_name; ?>"readonly > </td> 
		 

	</tr>
	
	<tr>
		<td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> User Story : &nbsp;</label></td>
    <td><input type="text" id="userstory" name="userstory"  style="width:450px" value="<?php echo $user_story; ?>"readonly > </td> 
		 
	</tr>
	<tr>
  		<td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Task Name : &nbsp;</label></td>
      <td><input type="text" id="task" name="task"  style="width:450px" value="<?php echo $Task_name; ?>"readonly > </td> 
  		
	</tr>

	</tr>

	<tr>
		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Description : &nbsp;</label></td>
    <td><textarea name="description" rows="10" cols="80" class= "input" style="width:450;overflow:auto" id="_random_id_9" 
		 	><?php echo $description; ?></textarea> 
		 </td>
	</tr>

	<tr>
		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Owner : &nbsp;</label></td>
    <td><input type="text" id="owner" name="owner"  style="width:450px" value="<?php echo $owner; ?>"readonly > </td> 
		
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
      <td><input type="text" id="Time" name="time"  style="width:200px" value="<?php echo $estimated_time; ?>" > Hours</td> 


	</tr>
	<tr>
  		<td bgcolor="#D8DFE6" style="text-align:right;"><label> To Do : &nbsp;</label></td>
      <td><input type="text" id="ToDo" name="toDo"  style="width:200px" value="<?php echo $to_do; ?>" > Hours</td> 

	</tr>

	<tr>
  		<td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Ready : &nbsp;</label></td>
      <td><input type="checkbox"  name="ready" value="1"<?php if($ready=='1') {echo 'checked="checked"';}else {echo '';}?>/></td> 
	</tr>
	
	<tr>
  		<td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Blocked : &nbsp;</label></td>
    <td><input type="checkbox"  name="blocked" value="1"<?php if($blocked=='1') {echo 'checked="checked"';}else {echo '';}?>/></td> 
	</tr>

	<tr>
  		<td bgcolor="#D8DFE6" style="text-align:right;"><label> Blocked Reason : &nbsp;</label></td>
      <td><input type="text" id="Blocked" name="blockedreason"  style="width:450px" value="<?php echo $blocked_reason; ?>" > </td> 

	</tr>

	<tr >
        <td >&nbsp;</td>
	</tr>

	<tr>  
  		<td>
  		</td>
  		<td>
    	<button style="width:120px" name="delete">Delete</button>
    	<button style="width:120px" type="button" name="cancel" id="cancel" onclick="goBack()">Cancel</button>
       
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