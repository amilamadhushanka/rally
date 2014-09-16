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
    echo link_tag('assets/css/bootstrap.min.css');
    echo link_tag('assets/css/bootstrap-timepicker.min.css');
    echo link_tag('assets/css/bootstrap-timepicker.css');
    echo link_tag('assets/css/bootstrap-responsive.css');
    echo link_tag('assets/css/bootstrap-theme.min.css');
    echo link_tag('assets\jBox-master\Source\jBox.css');
    
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/bootstrap-timepicker.min.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/bootstrap.min.js'); ?>></script>
     <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/events";
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
      $id=$row->id;
      $name=$row->name;
      $description=$row->description;
      $notifyTo=$row->notifyTo;
      $date=$row->date;
      $time=$row->time;
      $project=$row->project;
      $team=$row->team;

    }
  ?>

<div style="width:1350px; height:530px; overflow:scroll; overflow-x:hidden; ">

<table>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;Remove Event</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/deleteEvent/delete" onSubmit="return confirm('Are you sure you want to remove this event?')">

<div style="height:440px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtProject" value="<?php echo $project; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
    </td> 
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> TEAM : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtTeam" class="form-control" style="width:450px; border: none; box-shadow: none" value="<?php echo $team; ?>" readonly> </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Event</font></td>
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> ID : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtId" class="form-control" style="width:450px; border: none; box-shadow: none" value="<?php echo $id; ?>" readonly> </td> 
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td>
      <table>
        <tr>
          <td>
            <input type="text" id="txt" name="txtName" class="form-control" style="width:450px" value="<?php echo $name; ?>" readonly>
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
    <td><TEXTAREA ROWS="8" COLS="30" id="ta" name="txtDescription" class="form-control form_element" style="width:450px;" readonly><?php echo $description; ?></TEXTAREA></td> 
  </tr>

  <tr><th bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Notify to : &nbsp;</label></th>
    <td>
      <?php 
            foreach ($notifyCount as $row){
              $notificationCount=$row['cnt']; 
            } 
      ?>
      <select name="notifyTo" disabled>
      <?php  
        if($notificationCount!=1){
          echo '<option value="all">All</option>';
        }
        elseif($notificationCount==1) {
          echo '<option value="all">All</option>';
          foreach ($teamMembers as $row) {
            if($notifyTo==$row['userName']){
             echo '<option value="' . $row['userName'] .'" selected>' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
            }
            if($notifyTo!=$row['userName']){
              echo '<option value="' . $row['userName'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
            }
          }
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Date : &nbsp;</label></td>
    <td><input type="date" id="txtDate" name="txtDate" class="form-control" style="width:150px;height:30px;" value="<?php echo $date; ?>" readonly></td>
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Time : &nbsp;</label></td>
    <td>
      <input id="txtTime" name="txtTime" type="time" class="input-small" style="width:150px;height:30px;margin-top:5px;" value="<?php echo $time; ?>" readonly>
    </td>
  </tr>
</table>
</div>

  <center>
  <table>
    <tr >
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
      </td>
      <td>
        <button style="width:120px" type="submit" name="save" id="save">Remove</button>
        <button style="width:120px" type="button" name="cancel" onclick="goBack()">Cancel</button>
      </td>
    </tr>

  </table>
        
  <?php echo validation_errors('<p style="color: red;">');?>
  </center>
  <br>
</div>

</form>


</body>

</html>
