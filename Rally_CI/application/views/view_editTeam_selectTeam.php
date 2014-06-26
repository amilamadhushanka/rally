<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">


     <title>Select Team</title>

 </head>

<body>
  <br><br><br><br><br><br><br>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Team</h3>



<form class="form-defect" role = "form" method = "post" action = "editTeam_selectTeam">

<div style="height:200; border:thin solid; border-color:DarkGray;">
<br><br><br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="2">
  <col width="100">

  <tr>&nbsp;</tr>

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label>Team  : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td><select id="team" name="select_team" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option  selected="true" style="display:none; ">Select Team</option>
            <?php 
              loadTeam();
            ?>
            
        </select>
    </td> 
  </tr>
  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label>Project  : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td><select id="project" name="project" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option  selected="true" style="display:none; ">Select Project</option>
            <?php 
              loadProject();
            ?>
            
        </select>
    </td> 
  </tr>

</table>
</div>

  <center>
  <table>
    <tr>
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
      </td>
      <td>
        <button style="width:120px" type="submit" name="save" id="save" >Proceed</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>
  </center>

</form>


</body>

</html>


<?php

function loadTeam()
{
  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("select * from newteam");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['teamId'] .'">' . $row['teamId'] .'</option>';
    }
}

function loadProject()
{
  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("select * from project");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
}

?>
