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
    
    <title>Iteration</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

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
  
  <?php
    foreach ($result as $row) {
      $name=$row->name;
      $theme=$row->theme;
      $startDate=$row->startDate;
      $releaseDate=$row->releaseDate;
      $version=$row->version;
      $state=$row->state;
      $plannedVelocity=$row->plannedVelocity;
      $project=$row->project;
      
    }
  ?>

  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remove Release</h3>

  <form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/deleteRelease/delete">
<div style="height:400px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF" >Project Name : &nbsp;</label></td>
    <td>
      <input type="text" id="project" name="project" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" value="<?php echo $project; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Name : &nbsp;</label></td>
    <td><input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" readonly value="<?php echo $name; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF"> Theme : &nbsp;</label></td>
    <td><input type="text" id="theme" name="theme" class="form-control" style="width:450px; margin-top:5px;"   readonly value="<?php echo $theme; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Start Date : &nbsp;</label></td>
    <td><input type="text" id="startDate" name="startDate" class="form-control" style="width:450px; margin-top:5px;" readonly value="<?php echo $startDate; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Release Date : &nbsp;</label></td>
    <td><input type="text" id="releaseDate" name="releaseDate" class="form-control" style="width:450px; margin-top:5px;" readonly value="<?php echo $releaseDate; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Version : &nbsp;</label></td>
    <td><input type="text" id="version" name="version" class="form-control" style="width:450px; margin-top:5px;" readonly value="<?php echo $version; ?>"></td>
  </tr>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">State : &nbsp;</th>
    
    <td>
      <select name="state" disabled>
        <option value="plnning" <?php if($state=='plnning') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Submitted</option>
        <option value="active" <?php if($state=='active') {
                                          echo 'selected';
                                        } 
                                        else {
                                          echo '';
                                        }
                                  ?>>Open</option>
        <option value="accepted" <?php if($state=='accepted') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Fixed</option>
        
      </select>
    </td> 

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Planned Velocity : &nbsp;</label></td>
    <td><input type="text" id="plannedVelocity" name="plannedVelocity" class="form-control" style="width:450px; margin-top:5px;" readonly value="<?php echo $plannedVelocity; ?>"></td>
  </tr>

  
  <center>
  <table>
    <tr>
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
      </td>
      <td>
        <button style="width:120px" type="submit" name="delete" id="delete">Remove</button>
        <button style="width:120px" type="button" name="cancel" id="cancel" onclick="goBack()">Cancel</button>
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
