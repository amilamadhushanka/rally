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
    
    <title>Userstory</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <!--Display date chooser-->
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
       $(function() {
         $( "#txtTargetDate" ).datepicker();
         $( "#txtCreationDate" ).datepicker();   
      });
    </script>

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

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/backlog/view_userStories";
        window.location.assign(url);
      }
    </script>

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
      $project=$row->project;
      $name=$row->name;
      $theme=$row->theme;
      $startDate=$row->startDate;
      $releaseDate=$row->releaseDate;
      $version=$row->version;
      $state=$row->state;
      $plannedVelocity=$row->plannedVelocity;
      

    }
  ?>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Release</h3>



<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/editRelease/update" enctype="multipart/form-data">
<div style="height:420px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

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
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td><input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" readonly value="<?php echo $name; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Theme : &nbsp;</label></td>
    <td><input type="text" id="theme" name="theme" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $theme; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Start Date : &nbsp;</label></td>
    <td><input type="text" id="startDate" name="startDate" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $startDate; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Release Date : &nbsp;</label></td>
    <td><input type="text" id="releaseDate" name="releaseDate" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $releaseDate; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Version : &nbsp;</label></td>
    <td><input type="text" id="version" name="version" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $version; ?>"></td>
  </tr>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">State : &nbsp;</th>
    
    <td>
      <select name="state">
        <option value="Planning" <?php if($state=='Planning') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Submitted</option>
        <option value="Active" <?php if($state=='Active') {
                                          echo 'selected';
                                        } 
                                        else {
                                          echo '';
                                        }
                                  ?>>Open</option>
        <option value="Accepted" <?php if($state=='Accepted') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>
      </select>
    </td> 


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Planned Velocity : &nbsp;</label></td>
    <td><input type="text" id="plannedVelocity" name="plannedVelocity" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $plannedVelocity; ?>"></td>
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
        <button style="width:120px" type="submit" name="save" id="save">Update</button>
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

<?php

function loadIterations($project,$iteration)
{   
    echo '<option value="'.$iteration.'" selected>' . $iteration .'</option>'; //set selected

    $result = mysql_query("select * from iteration where project='$project' AND name!='$iteration'");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'" >' . $row['name'] .'</option>';
    }
      
}

?>


