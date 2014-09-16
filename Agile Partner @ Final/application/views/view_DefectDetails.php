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
    
    <title>Defect</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <!--Display date chooser-->
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/backlog/view_defects";
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
      $id=$row->id;
      $name=$row->name;
      $creationDate=$row->creationDate;
      $foundIn=$row->foundIn;
      $fixedIn=$row->fixedIn;
      $targetBuild=$row->targetBuild;
      $verifiedIn=$row->verifiedIn;
      $targetDate=$row->targetDate;
      $blockedReason=$row->blockedReason;
      $planEstimate=$row->planEstimate;
      $affectsDoc=$row->affectsDoc;
      $blocked=$row->blocked;
      $ready=$row->ready;
      $iteration=$row->iteration;
      $userstory=$row->userStory;
      $owner=$row->owner;
      $submittedBy=$row->submittedBy;
      $state=$row->state;
      $priority=$row->priority;
      $severity=$row->severity;
      $environment=$row->environment;
      $resolution=$row->resolution;
      $scheduleState=$row->scheduleState;

    }
  ?>

<table>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Defect Details</h3>
    </td>
  </tr>
</table>



<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/viewDefect/changeState" enctype="multipart/form-data" >

<div style="height:560px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="project" class="form-control" style="width:100px; border: none; box-shadow: none" value="<?php echo $project; ?>" readonly>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> ID : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtId" class="form-control" style="width:100px; border: none; box-shadow: none" value="<?php echo $id; ?>" readonly> </td> 
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Name : &nbsp;</label></td>
    <td><input type="text" id="txt" name="txtName" class="form-control" style="width:450px" required value="<?php echo $name; ?>" readonly></td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> Description : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtDescription" class="form-control form_element" value="<?php foreach ($result as $row) { echo $row->description; } ?>" readonly></TEXTAREA></td> 
  </tr>
  <!--
  <tr>
    <td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Attachments : &nbsp;</label></td>
    <td><input id="attachment" name="attachment" class="element file" type="file" size="30" style="color:red;"/> </td> 
  </tr>
  -->
  <tr><th bgcolor="#D8DFE6" style="text-align:right;"> Owner : &nbsp;</th>
    <td>
        <?php 
          loadOwner($project,$owner);
        ?>
    </td>
  </tr>

    <tr>
      <td>&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Defect</font></td>
  </tr>

  <tr><th bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> State : &nbsp;</label></th>
    <td colspan="3"> 
     
      <table>
  </tr>

  <tr> 
    <td>
        <select name="state" style="width:200px">
        <option value="Submitted">Submitted</option>
        <option value="Open">Open</option>
        <option value="Fixed">Fixed</option>
        <option value="Closed">Closed</option>
        <?php 
          selectState($state);
        ?>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Environment : &nbsp;</label></td>
    <td>
        <?php 
          selectEnvironment($environment);
        ?>
    </td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Priority : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
        <?php 
          selectPriority($priority);
        ?>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Severity :&nbsp;</label></td>
    <td>
        <?php 
          loadSeverity($severity);
        ?>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Submitted By : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <?php 
       loadSubmittedBy($submittedBy);
      ?>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Creation Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txtCreationDate" name="txtCreationDate" style="width:200px" class="form-control" value="<?php echo $creationDate; ?>" readonly>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Found In : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtFoundIn" class="form-control" style="width:200px" value="<?php echo $foundIn; ?>" readonly>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Fixed In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtFixedIn" class="form-control" style="width:200px" value="<?php echo $fixedIn; ?>" readonly>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Target Build : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtTargetBuild" class="form-control" style="width:200px" value="<?php echo $targetBuild; ?>" readonly>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Verified In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtVerifiedIn" class="form-control" style="width:200px" value="<?php echo $verifiedIn; ?>" readonly>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Resolution : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
        <?php 
          loadResolution($resolution);
        ?>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Target Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txtTargetDate" name="txtTargetDate" style="width:200px" class="form-control" value="<?php echo $targetDate; ?>" readonly>
    </td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Affects Doc : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "affectsDoc" value = "1" name = "affectsDoc" <?php if($affectsDoc=='1') {
                                                                                                  echo 'checked="checked"';
                                                                                                }
                                                                                                else {
                                                                                                  echo '';
                                                                                                }
                                                                                          ?> disabled/></td> 
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>User Story : &nbsp;</label></td>
    <td>
        <?php 
          loadUserStory($project,$userstory);
        ?>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Schedule</font></td>
  </tr>

  <tr><th bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Schedule State : &nbsp;</label></th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
        <?php 
          loadScheduleState($scheduleState);
        ?>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "blocked" value = "1" name = "blocked" onclick="enableText(this.checked, 'txtBlockedReason');" <?php if($blocked=='1') {
                                                                                                                                                    echo 'checked="checked"';
                                                                                                                                                  }
                                                                                                                                                  else {
                                                                                                                                                    echo '';
                                                                                                                                                  }
                                                                                                                                            ?> disabled/></td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Ready : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>&nbsp;<input type = "checkbox" id = "ready" value = "1" name = "ready" <?php if($ready=='1') {
                                                                                        echo 'checked="checked"';
                                                                                      }
                                                                                      else {
                                                                                        echo '';
                                                                                      }
                                                                                ?> disabled/></td>

    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked Reason : &nbsp;</label></td>
    <td><input type="text" id="txtBlockedReason" name="txtBlockedReason" class="form-control" style="width:200px" disabled value="<?php echo $blockedReason; ?>"></td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Iteration : &nbsp;</label></td>
    <td>
        <?php 
          loadIterations($project,$iteration);
        ?>
    </td> 
  </tr>


  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Plan Estimate : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td><input type="text" id="txt" name="txtPlanEstimate" class="form-control" style="width:100px" value="<?php echo $planEstimate; ?>" readonly></td>
    <td >&nbsp;</td>
    <td><label> points</label></td>
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
        <button style="width:120px" type="submit" name="save" id="save">Change State</button>
        <button style="width:120px" type="button" name="cancel" id="cancel" onclick="goBack()">Cancel</button>
        
      </td>
      <td>
      </td>
    </tr>

    
  </table>
<br>
    <?php echo validation_errors('<p style="color: red;">');?>
  
  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
</body>

</html>

<?php

function loadUserStory($project,$userstory)
{
    //set selected
    $sql=mysql_query("SELECT Name from userstory where ID ='$userstory' LIMIT 1");

        while ($row = mysql_fetch_array($sql)) {
          $userstory_name = $row['Name'];
          //echo '<input type="text" value='.$row['Name'].' class="form-control" style="width:500px" readonly>';
          echo $userstory_name;
        }  
}

function loadIterations($project,$iteration)
{   
  echo '<input type="text" value='.$iteration.' class="form-control" style="width:200px" readonly>';
}

function loadOwner($project,$owner)
{
      //set selected
      $sql=mysql_query("SELECT fName,lName from users where username ='$owner' LIMIT 1");
      if(mysql_num_rows($sql)>0){
        $array = array();

        while ($row = mysql_fetch_array($sql)) {
          $firstName = $row['fName'];
          $lastName = $row['lName'];
        echo '<input type="text" value='. $row['fName'].'&nbsp;'.$row['lName'] .' class="form-control" style="width:200px" readonly>';
        }
      }
}

function loadSubmittedBy($submittedBy)
{
      //set selected
      $sql=mysql_query("SELECT fName,lName from users where username ='$submittedBy' LIMIT 1");
      if(mysql_num_rows($sql)>0){
        $array = array();

        while ($row = mysql_fetch_array($sql)) {
        echo '<input type="text" value='. $row['fName'].'&nbsp;'.$row['lName'] .' class="form-control" style="width:200px" readonly>';
        }
      }
}

function selectState($state){
  //set selected
  echo '<option value="$state" selected>' . $state .'</option>';
}

function selectPriority($priority){
  //set selected
  echo '<input type="text" value='.$priority.' class="form-control" style="width:200px" readonly>';
}

function loadSeverity($severity){
  //set selected
  echo '<input type="text" value='.$severity.' class="form-control" style="width:200px" readonly>';
}

function selectEnvironment($environment){
  //set selected
  echo '<input type="text" value='.$environment.' class="form-control" style="width:200px" readonly>';
}

function loadResolution($resolution){
  //set selected
  echo '<input type="text" value='.$resolution.' class="form-control" style="width:200px" readonly>';
}

function loadScheduleState($scheduleState){
  //set selected
  echo '<input type="text" value='.$scheduleState.' class="form-control" style="width:200px" readonly>';
}

?>
