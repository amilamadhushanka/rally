<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>
    
    <title>Iteration</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

    <!--Display date chooser-->
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    

</head>

<body>

  <?php
    foreach ($result as $row) {
      $project=$row->project;
      $name=$row->name;
      $theme=$row->theme;
      $startDate=$row->startDate;
      $endDate=$row->endDate;
      $state=$row->state;
      $PlannedVelocity=$row->PlannedVelocity;
    }
  ?>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remove Iteration</h3>



<form class="form-iteration" role = "form" method = "post" action = "/Rally_CI/deleteIteration/delete" onSubmit="return confirm('Are you sure you want to delete this iteration?')">

<div style="height:370px; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="project" name="project" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $project; ?>" readonly>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtName" class="form-control" style="width:450px; margin-top:5px;" readonly value="<?php echo $name; ?>"></td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> Theme : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtTheme" class="form-control form_element" value="<?php echo $theme; ?>" readonly></TEXTAREA></td> 
  </tr>

  <tr><th bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF"> Start Date : &nbsp;</label></th>
    <td colspan="3"> 
     
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txtStartDate" name="txtStartDate" class="form-control" value="<?php echo $startDate; ?>" readonly>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> End Date :&nbsp;</label></td>
    <td>
      <input type="text" id="txtEndDate" name="txtEndDate" class="form-control" value="<?php echo $endDate; ?>" readonly>
    </td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">State : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="state" disabled>
        <option value="Planning" <?php if($state=='Planning') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Planning</option>
        <option value="Committed" <?php if($state=='Committed') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Committed</option>
        <option value="Accepted" <?php if($state=='Accepted') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Accepted</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Planned Velocity :&nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtPlannedVelocity" class="form-control" value="<?php echo $PlannedVelocity; ?>" readonly>
    </td>
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
        <button style="width:120px" type="submit" name="save" id="save">Remove</button>
        <!-- <button style="width:120px" name="btnCancel" id="btnCancel" onclick="location.href='<?php echo base_url();?>plan'">Cancel</button> -->
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


