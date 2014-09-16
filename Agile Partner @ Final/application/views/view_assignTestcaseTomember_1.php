<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>Testcase</title>

    <!-- Custom styles for this template -->

    <?php
    echo link_tag('assets/css/addDefects.css');
    echo link_tag('assets/css/bootstrap.min.css');
    ?>

    <!--Display date chooser-->

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
     
</head>

<body>

<table>
  <br>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Testcase</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/assignTestcaseToMember/assign">

<div style="height:250px; border:thin solid; border-color:DarkGray;">
<br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="project" value="<?php echo (isset($project)) ? $project : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Userstory : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="userstory" value="<?php echo (isset($us_id)) ? $us_id : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Testcase : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="testcase" value="<?php echo (isset($tc_id)) ? $tc_id : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Iteration : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="iteration" value="<?php echo (isset($iteration)) ? $iteration : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Assign to : &nbsp;</label></td>
    <td>
      <select name="assignedTo" style="width:200px;" required>
          <option value="" selected="true" style="display:none; ">«Select Member»</option>
         <?php 
          loadMembers($project);
        ?>
      </select>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
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
        <button style="width:120px" type="submit" name="save" id="save">Assign</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>

  <?php echo validation_errors('<p style="color: red;">');?>
  
  </center>

</form>

<br>
</body>

</html>


<?php

//load iterations in the selected project
function loadMembers($se_project)
{
    $result = mysql_query("select u.fName,u.lName,u.username from users u,newteam t where t.userName=u.username AND t.projectName='$se_project'");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['username'] .'">' . $row['fName'] .'&nbsp;'. $row['lName'] .'</option>';
      }
}


?>
