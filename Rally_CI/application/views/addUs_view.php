<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>
    
    <title>Userstory</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/addDefects.css');
    ?>


     <!--Enable Blocked Reason textbox-->
    <script>
      function enableText(checkBool, textID)
      {
        textFldObj = document.getElementById(textID);
        //Disable the text field
        textFldObj.disabled = !checkBool;
        //Clear value in the text field
        if (!checkBool) { 
          textFldObj.value = '';
        }
      }
    </script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

</head>

<body>

	<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Userstory</h3>

<form class="form-defect" role = "form" method = "post" action = "us_controller" enctype="multipart/form-data">

<div style="height:560px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#D63030"><label style="color: FFFFFF" >Project Name : &nbsp;</label></td>
    <td>
      <input type="text" id="project" name="project" readonly value="<?php echo (isset($selected_project)) ? $selected_project : ''; ?>" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" >
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> ID : &nbsp;</label></td>
    <td><input type="text" id="uid" name="uid" class="form-control" style="width:100px; margin-top:5px; border: none; box-shadow: none" value="<?php displayId(); ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D63030"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td><input type="text" id="uname" name="uname" class="form-control" style="width:450px; margin-top:5px;"  ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Rank : &nbsp;</label></td>
    <td><input type="text" id="rank" name="rank" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Tags : &nbsp;</label></td>
    <td><input type="text" id="tags" name="tags" class="form-control" style="width:450px; margin-top:5px;"  ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Description : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="description" name="description" class="form-control form_element"></TEXTAREA></td> 
  </tr>


  <tr><th style="text-align:right;" bgcolor="#D8DFE6">Priority : &nbsp;</th>

      
    <td>
      <select name="priority">
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
      </select>
    </td> 
  </tr>
  
  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Owner : &nbsp;</label></td>
    <td>
      <select id="owner" name="owner" onChange="changeFunc();">
        <option value="" selected="true" style="display:none" >«No Entry»</option>
        <?php 
          loadOwner($selected_project);
        ?>
      </select>
    </td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Schedule</font></td>
  </tr>

  <tr><td style="text-align:right;" bgcolor="#D63030"><label style="color: FFFFFF"> State : &nbsp;</label></td>
    <td colspan="3"> 
     
      <table>
  </tr>


   <tr> 
    <td>
      <select name="state">
        <option value="submitted" selected>Submitted</option>
        <option value="open">Open</option>
        <option value="fixed">Fixed</option>
        <option value="closed">Closed</option>
      </select>
    </td> 

    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "blocked" value = "1" name = "blocked" onclick="enableText(this.checked, 'txtBlockedReason');"/></td>
  </tr>

</table>

<tr><th bgcolor="#D8DFE6" style="text-align:right;">Ready : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>&nbsp;<input type = "checkbox" id = "ready" value = "1" name = "ready" /></td>
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked Reason : &nbsp;</label></td>
    <td><input type="text" id="txtBlockedReason" name="txtBlockedReason" class="form-control" style="width:200px" disabled></td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Iteration : &nbsp;</label></td>
    <td>
      <select name="iteration" >
        <option value="unscheduled" selected>«Unscheduled»</option>
        <?php 
          loadIterations($selected_project);
        ?>
      </select>
    </td> 
  </tr>

  

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Plan-Estima : &nbsp;</label></td>
    <td><input type="text" id="planEstima" name="planEstima" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  
  </table>
  
  <tr>
    <td >&nbsp;</td>
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
        <button style="width:120px" type="submit" name="save" id="save">Save & New </button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>

  <?php echo validation_errors('<p style="color: red;">');?>

  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html>

<?php

//display defect id function
function displayId(){
      
      $result = mysql_query("select * from userstory");

      if(mysql_num_rows($result)>0){
        $array = array();

        while ($row = mysql_fetch_array($result)) {
          $num = explode("-", $row['ID']);
          array_push($array,$num[1]);
        }

        $max=max($array);
        echo "US-".++$max;
      }
      else{
        echo "US-1";
      }
  }

//load members in the team assigned to selected project
function loadOwner($se_project)
{
  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("select * from users u,newteam t where u.username=t.userName AND t.projectName='$se_project' order by u.fName,u.lName ASC");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['username'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
        
      }
}

//load iterations in the selected project
function loadIterations($se_project)
{
    $result = mysql_query("select * from iteration where project='$se_project'");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
      }
}

?>
