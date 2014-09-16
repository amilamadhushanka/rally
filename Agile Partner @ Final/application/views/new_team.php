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

    <title>Create New Team</title>

</head>
<body>
<form role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/createNewTeam">
<div id="container">
	<br><br><br><br><br><br><br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="500">

  <tr>
   <td>
    <h3>Create Team</h3>
    </td>
  </tr>

<!--
  <tr>
  <td bgcolor="#D8DFE6" colspan="4"> Project Information  </td>
   </tr>
-->
<tr >
            <td >&nbsp;</td>
</tr>

<tr>
  <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Team ID : </label></td>
  <td><input type="text" id="Team" name="team" value="<?php echo set_value('team');?>" style="width:450px"> </td> 

</tr>

<tr>
  <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Name : </label></td>
 <td>
   <select name ="project" style="width:450px" value="<?php echo set_select('project');?>">
    <?php

            $sql_data = "SELECT name FROM project";
            $result_data = mysql_query($sql_data);

            while($row_data = mysql_fetch_array($result_data))
                {
                    echo "<option value='".$row_data['name']."'>".$row_data['name']."</option>";
                }
            
               
        ?>
         </select>
 </td>

  <tr >
            <td   >&nbsp;</td>
</tr>


<tr>  
  <td>
  </td>
  <td>
    <button style="width:120px" name="save_new">Create Team</button>
    <button style="width:97px" name="cancel" onclick="window.close()">Cancel</button>
  </td>
</tr>

</table>


<center>
    <?php echo validation_errors('<p style="color: red;">');?>
</center>
<br>
</form>
</body>
</html>