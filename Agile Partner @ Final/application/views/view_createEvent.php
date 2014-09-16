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
    
    <title>Events</title>


    <!-- Custom styles for this template -->

    <?php
    echo link_tag('assets/css/addDefects.css');
    echo link_tag('assets/bootstrap.min.css');
    echo link_tag('assets/css/bootstrap-timepicker.min.css');
    echo link_tag('assets/css/bootstrap-timepicker.css');
    echo link_tag('assets/css/bootstrap-responsive.css');
    echo link_tag('assets/css/bootstrap-theme.min.css');
    
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/bootstrap-timepicker.min.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/bootstrap.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    
    <script type="text/javascript">
       $(function() {
         $( "#txtDate1" ).datepicker();
      });
    </script>

</head>

<body>

<table>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Event</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/createEvent">

<div style="height:500px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtProject" value="<?php echo $_SESSION['project']; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> TEAM : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtTeam" class="form-control" style="width:450px; border: none; box-shadow: none" value="<?php echo $_SESSION['team']; ?>" readonly> </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Event</font></td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> ID : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtId" class="form-control" style="width:450px; border: none; box-shadow: none" value="<?php echo $eventId; ?>" readonly> </td> 
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td>
      <table>
        <tr>
          <td>
            <input type="text" id="txt" name="txtName" class="form-control" style="width:450px" required autofocus>
          </td>
          <td>
            &nbsp;<em style="color: red;">*</em>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> Description : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtDescription" class="form-control form_element" style="width:450px;"></TEXTAREA></td> 
  </tr>

  <tr><th bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Notify to : &nbsp;</label></th>
    <td>
      <select name="notifyTo" required>
        <option value="all" selected >All</option>
        <?php
          foreach ($teamMembers as $row) {
             echo '<option value="' . $row['userName'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
          }
        ?>
      </select>
    </td>
  </tr>
  <tr> <?php $today=date("Y-m-d"); ?>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Date : &nbsp;</label></td>
    <td><input type="date" id="txtDate" name="txtDate" class="form-control" min="<?php echo $today; ?>" style="width:150px;" required></td>
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Time : &nbsp;</label></td>
    <td>
      <input id="txtTime" name="txtTime" type="time" class="input-small" style="width:150px;" required>
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
        <button style="width:120px" type="submit" name="save" id="save">Create</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>

        
  <?php echo validation_errors('<p style="color: red;">');?>
  
  </center>

</form>


</body>

</html>
