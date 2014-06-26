<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>
    
    <title>Userstory</title>

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
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign to Iteration</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>

<form class="form-defect" role = "form" method = "post" action = "/Rally_CI/usAssignedToIteration/assign">

<div style="height:200px; border:thin solid; border-color:DarkGray;">
<br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="project" value="<?php echo (isset($pname)) ? $pname : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF">Userstory : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="userstory" value="<?php echo (isset($ID)) ? $ID : ''; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr >
    <td bgcolor="#D8DFE6">&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF"> Iteration : &nbsp;</label></td>
    <td>
      <select name="iteration" style="width:450px;" required>
          <option value="" selected="true" style="display:none; ">«Select Iteration»</option>
         <?php 
          loadIterations($pname);
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
function loadIterations($se_project)
{
    $result = mysql_query("select name from iteration where project='$se_project'");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
      }
}


?>
