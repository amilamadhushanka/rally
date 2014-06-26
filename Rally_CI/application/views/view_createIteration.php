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
    
    <script type="text/javascript">
       $(function() {
         $( "#txtStartDate" ).datepicker();
         $( "#txtEndDate" ).datepicker();
      });
    </script>


</head>

<body>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Iteration</h3>



<form class="form-iteration" role = "form" method = "post" action = "createIteration" >

<div style="height:370px; border:thin solid; border-color:DarkGray;">
<br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <table>
        <tr>
          <td>
            <select id="project" name="project" required style="width:450px" autofocus>
              <option value="" selected="true" style="display:none; ">« Select Project »</option>
                <?php 
                  loadProject();
                ?>
            </select>
          </td>
          <td>
            &nbsp;<em style="color: red;">*</em>
          </td>
        </tr>
      </table>
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
    <td>
      <table>
        <tr>
          <td>
            <input type="text" id="txt" name="txtName" class="form-control" style="width:450px; margin-top:5px;" required value="<?php echo set_value('txtName');?>">
          </td>
          <td>
            &nbsp;<em style="color: red;">*</em>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> Theme : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtTheme" class="form-control form_element" value="<?php echo set_value('txtTheme');?>"></TEXTAREA></td> 
  </tr>

  <tr><th bgcolor="#D63030" style="text-align:right;"><label style="color: FFFFFF"> Start Date : &nbsp;</label></th>
    <td colspan="3"> 
     
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txtStartDate" name="txtStartDate" class="form-control" placeholder="Select a date" value="<?php echo set_value('txtStartDate');?>">
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> End Date :&nbsp;</label></td>
    <td>
      <input type="text" id="txtEndDate" name="txtEndDate" class="form-control" placeholder="Select a date" value="<?php echo set_value('txtEndDate');?>">
    </td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">State : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="state">
        <option value="Planning" selected>Planning</option>
        <option value="Committed" >Committed</option>
        <option value="Accepted" >Accepted</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Planned Velocity :&nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtPlannedVelocity" class="form-control" value="<?php echo set_value('txtPlannedVelocity');?>">
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
        <button style="width:120px" type="submit" name="save" id="save">Save & New</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>

  <?php echo validation_errors('<p style="color: red;">');?>

  </center>

</form>


</body>

</html>


<?php

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
