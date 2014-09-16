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
      $state=$row->state;
      $priority=$row->priority;
      $severity=$row->severity;
      $environment=$row->environment;
      $resolution=$row->resolution;
      $scheduleState=$row->scheduleState;
      $description=$row->description;
      $submittedBy=$row->submittedBy;
      //$attachment=$row->attachment;

    }
  ?>

<table>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Update Defect</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>



<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/editDefect/update" enctype="multipart/form-data">

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
    <td><input type="text" id="txt" name="txtName" class="form-control" style="width:450px" required value="<?php echo $name; ?>"></td>
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label> Description : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtDescription" class="form-control form_element"> <?php echo $description; ?></TEXTAREA></td> 
  </tr>
  
  <tr>
    <td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Attachments : &nbsp;</label></td>
    <td><input id="attachment" name="attachment" class="element file" type="file" size="30" style="color:red;" /> </td> 
  </tr>
  
  <tr><th bgcolor="#D8DFE6" style="text-align:right;"> Owner : &nbsp;</th>
    <td>
      <select name="owner">
        <option value="noEntry">«No Entry»</option>
        <?php 
          loadOwner($project,$owner);
        ?>
      </select>
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
      <select name="state">
        <option value="Submitted" <?php if($state=='Submitted') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Submitted</option>
        <option value="Open" <?php if($state=='Open') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Open</option>
        <option value="Fixed" <?php if($state=='Fixed') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Fixed</option>
        <option value="Closed" <?php if($state=='Closed') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Closed</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Environment : &nbsp;</label></td>
    <td>
      <select name="environment">
        <option value="«No Entry»" <?php if($environment=='«No Entry»') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>«No Entry»</option>
        <option value="Development" <?php if($environment=='Development') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Development</option>
        <option value="Test" <?php if($environment=='Test') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Test</option>
        <option value="Staging" <?php if($environment=='Staging') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Staging</option>
        <option value="Production" <?php if($environment=='Production') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Production</option>
      </select>
    </td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Priority : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="priority">
        <option value="«No Entry»" <?php if($priority=='«No Entry»') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>«No Entry»</option>
        <option value="1 - Resolve Immediately" <?php if($priority=='1 - Resolve Immediately') {
                                                        echo 'selected';
                                                      }
                                                      else {
                                                        echo '';
                                                      }
                                                ?>>1 - Resolve Immediately</option>
        <option value="2 - High Attention" <?php if($priority=='2 - High Attention') {
                                                    echo 'selected';
                                                  }
                                                  else {
                                                    echo '';
                                                  }
                                            ?>>2 - High Attention</option>
        <option value="3 - Normal" <?php if($priority=='3 - Normal') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>3 - Normal</option>
        <option value="4 - Low" <?php if($priority=='4 - Low') {
                                        echo 'selected';
                                      }
                                      else {
                                        echo '';
                                      }
                                ?>>4 - Low</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Severity :&nbsp;</label></td>
    <td>
      <select name="severity">
        <option value="«No Entry»" <?php if($severity=='«No Entry»') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>«No Entry»</option>
        <option value="1 - Crash/Data Loss" <?php if($severity=='1 - Crash/Data Loss') {
                                                    echo 'selected';
                                                  }
                                                  else {
                                                    echo '';
                                                  }
                                            ?>>1 - Crash/Data Loss</option>
        <option value="2 - Major Problem" <?php if($severity=='2 - Major Problem') {
                                                    echo 'selected';
                                                  }
                                                  else {
                                                    echo '';
                                                  }
                                            ?>>2 - Major Problem</option>
        <option value="3 - Minor Problem" <?php if($severity=='3 - Minor Problem') {
                                                    echo 'selected';
                                                  }
                                                  else {
                                                    echo '';
                                                  }
                                            ?>>3 - Minor Problem</option>
        <option value="4 - Cosmetic" <?php if($severity=='4 - Cosmetic') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                      ?>>4 - Cosmetic</option>
      </select>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Submitted By : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="submittedBy" style="width:160px;">
        <?php
          loadSubmittedBy($submittedBy);
        ?>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Creation Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txtCreationDate" name="txtCreationDate" class="form-control" value="<?php echo $creationDate; ?>" >
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Found In : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtFoundIn" class="form-control" style="width:200px" value="<?php echo $foundIn; ?>">
    </td> 
    <td >&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Fixed In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtFixedIn" class="form-control" style="width:200px" value="<?php echo $fixedIn; ?>">
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Target Build : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtTargetBuild" class="form-control" style="width:200px" value="<?php echo $targetBuild; ?>">
    </td> 
    <td >&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Verified In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtVerifiedIn" class="form-control" style="width:200px" value="<?php echo $verifiedIn; ?>">
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Resolution : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="resolution">
        <option value="«No Entry»" <?php if($resolution=='«No Entry»') {
                                        echo 'selected';
                                      }
                                      else {
                                        echo '';
                                      }
                                ?>>«No Entry»</option>
        <option value="Architecture" <?php if($resolution=='Architecture') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Architecture</option>
        <option value="Code Change" <?php if($resolution=='Code Change') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Code Change</option>
        <option value="Configuration Change" <?php if($resolution=='Configuration Change') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Configuration Change</option>
        <option value="Database Change" <?php if($resolution=='Database Change') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Database Change</option>
        <option value="Duplicate" <?php if($resolution=='Duplicate') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Duplicate</option>
        <option value="Need More Information" <?php if($resolution=='Need More Information') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Need More Information</option>
        <option value="Not a Defect" <?php if($resolution=='Not a Defect') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Not a Defect</option>
        <option value="Software Limitation" <?php if($resolution=='Software Limitation') {
                                              echo 'selected';
                                            }
                                            else {
                                              echo '';
                                            }
                                    ?>>Software Limitation</option>
        <option value="User Interface" <?php if($resolution=='User Interface') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>User Interface</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Target Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txtTargetDate" name="txtTargetDate" class="form-control" placeholder="Select a date" value="<?php echo $targetDate; ?>">
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
                                                                                          ?>/></td> 
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>User Story : &nbsp;</label></td>
    <td>
      <select name="userStory" disabled>
        <option value="">«No Entry»</option>
        <?php 
          loadUserStory($project,$userstory);
        ?>

      </select>
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
      <select name="scheduleState">
        <option value="Defined" <?php if($scheduleState=='Defined') {
                                        echo 'selected';
                                      }
                                      else {
                                        echo '';
                                      }
                                ?>>Defined</option>
        <option value="In-Progress" <?php if($scheduleState=='In-Progress') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>In-Progress</option>
        <option value="Completed" <?php if($scheduleState=='Completed') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Completed</option>
        <option value="Accepted" <?php if($scheduleState=='Accepted') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Accepted</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "blocked" value = "1" name = "blocked" onclick="enableText(this.checked, 'txtBlockedReason');" <?php if($blocked=='1') {
                                                                                                                                                    echo 'checked="checked"';
                                                                                                                                                  }
                                                                                                                                                  else {
                                                                                                                                                    echo '';
                                                                                                                                                  }
                                                                                                                                            ?>/></td>
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
                                                                                ?>/></td>

    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked Reason : &nbsp;</label></td>
    <td><input type="text" id="txtBlockedReason" name="txtBlockedReason" class="form-control" style="width:200px" disabled value="<?php echo $blockedReason; ?>"></td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Iteration : &nbsp;</label></td>
    <td>
      <select name="iteration" >
        <?php 
          loadIterations($project,$iteration);
        ?>
      </select>
    </td> 
  </tr>


  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Plan Estimate : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td><input type="text" id="txt" name="txtPlanEstimate" class="form-control" style="width:100px" value="<?php echo $planEstimate; ?>"></td>
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
      </td>
      <td>
        <button style="width:120px" type="submit" name="save" id="save">Update</button>
        <button style="width:120px" type="button" name="cancel" id="cancel" onclick="goBack()">Cancel</button>
        
      </td>
    </tr>

    
  </table>

    <?php echo validation_errors('<p style="color: red;">');?>
  <br>
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
    if(mysql_num_rows($sql)>0){
        $array = array();

        while ($row = mysql_fetch_array($sql)) {
          $userstory_name = $row['Name'];
        }
      echo '<option value="$userstory" selected>' . $userstory_name .'</option>';
    }
  
}

function loadIterations($project,$iteration)
{   
    if($iteration!='unscheduled'){
      echo '<option value="unscheduled">«Unscheduled»</option>';
      echo '<option value="'.$iteration.'" selected>' . $iteration .'</option>'; //set selected
    }
    else{
      echo '<option value="'.$iteration.'" selected>' . '«Unscheduled»' .'</option>'; //set selected
    }

    $result = mysql_query("select * from iteration where project='$project' AND name!='$iteration'");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'" >' . $row['name'] .'</option>';
    }
      
}

function loadOwner($project,$owner)
{
    $result = mysql_query("select DISTINCT u.fName,u.lName,u.username from users u,newteam t where u.username=t.userName AND t.projectName='$project' AND u.username!='$owner' order by u.fName,u.lName ASC");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['username'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
      }

      //set selected
      $sql=mysql_query("SELECT fName,lName from users where username ='$owner' LIMIT 1");
      if(mysql_num_rows($sql)>0){
        $array = array();

        while ($row = mysql_fetch_array($sql)) {
          $firstName = $row['fName'];
          $lastName = $row['lName'];
        }
        echo '<option value="'.$owner.'" selected>' . $firstName .'&nbsp;'. $lastName .'</option>';
      }

}

function loadSubmittedBy($submittedBy){
      $sql=mysql_query("SELECT fName,lName from users where username ='$submittedBy' LIMIT 1");
      if(mysql_num_rows($sql)>0){
        $array = array();

        while ($row = mysql_fetch_array($sql)) {
          $firstName = $row['fName'];
          $lastName = $row['lName'][0].'.';
        }
        echo '<option value="'.$submittedBy.'" selected>' . $firstName .'&nbsp;'. $lastName .'</option>';
      }
}


?>
