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
      echo link_tag('assets/css/addDefects.css');
    ?>

    <!--Display date chooser-->
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    
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

  

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    

</head>

<body>

  <?php
    foreach ($result as $row) {
      $project=$row->pname;
      $id=$row->ID;
      $name=$row->Name;
      $rank=$row->Rank;
      $tags=$row->Tag;
      $description=$row->Discription;
      $priority=$row->Priority;
      $owner=$row->Owner;
      $planEstima=$row->Plan_estima;
      $state=$row->state;
      $ready=$row->ready;
      $blocked=$row->blocked;
      $blockedReason=$row->blockedReason;
      $iteration=$row->iteration;

    }
  ?>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Userstory</h3>



<form class="form-defect" role = "form" method = "post" action = "/Rally_CI/editUserstory/update" enctype="multipart/form-data">
<div style="height:560px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#D63030"><label style="color: FFFFFF" >Project Name &nbsp;</label></td>
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
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> ID  &nbsp;</label></td>
    <td><input type="text" id="id" name="id" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" readonly value="<?php echo $id; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D63030"><label style="color: FFFFFF"> Name  &nbsp;</label></td>
    <td><input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $name; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Rank  &nbsp;</label></td>
    <td><input type="text" id="rank" name="rank" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $rank; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Tags  &nbsp;</label></td>
    <td><input type="text" id="tags" name="tags" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tags; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Description : &nbsp;</label></td>
    <td><TEXTAREA ROWS="10" COLS="30" id="description" name="description" class="form-control form_element" value="<?php echo $description; ?>"></TEXTAREA></td> 
  </tr>

<tr><td style="text-align:right;" bgcolor="#D8DFE6"><label> Priority : &nbsp;</label></td>
    <td colspan="3"> 
     
      <table>
  </tr>

  <tr> 
    <td>
      <select name="priority">
        <option value="High" <?php if($state=='High') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>High</option>
        <option value="Medium" <?php if($state=='Medium') {
                                          echo 'selected';
                                        } 
                                        else {
                                          echo '';
                                        }
                                  ?>>Medium</option>
        <option value="Low" <?php if($state=='Low') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Low</option>
        
      </select>
    </td> 
  </tr>
</table>
  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Owner  &nbsp;</label></td>
    <td><input type="text" id="owner" name="owner" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $owner; ?>"></td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Schedule</font></td>
  </tr>

  <tr><th bgcolor="#D63030" style="text-align:right;">State : &nbsp;</th>
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
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked Reason : &nbsp;</label></td>
    <td><input type="text" id="txtBlockedReason" name="txtBlockedReason" class="form-control" style="width:200px" disabled value="<?php echo $blockedReason; ?>"></td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Iteration : &nbsp;</label></td>
    <td>
      <select name="iteration" >
        <option value="unscheduled">«Unscheduled»</option>
        <?php 
          loadIterations($project,$iteration);
        ?>
      </select>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Plan-Estima  &nbsp;</label></td>
    <td><input type="text" id="planEstima" name="planEstima" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $planEstima; ?>"></td>
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


