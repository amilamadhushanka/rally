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
    
    ?>



    <!--Display date chooser-->

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    
    <script type="text/javascript">
       $(function() {
         $( "#txtTargetDate" ).datepicker();
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

</head>

<body>

<table>
  <tr>
    <td>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Defect</h3>
    </td>
    <td>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l, F jS, Y'); ?>
    </td>
  </tr>
</table>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/addDefect" enctype="multipart/form-data">

<div style="height:560px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>&nbsp;</tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF">Project : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="project" value="<?php echo $_SESSION['project']; ?>" class="form-control" style="width:450px; border: none; box-shadow: none" readonly>
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
    <td><input type="text" id="txt" name="txtId" class="form-control" style="width:100px; border: none; box-shadow: none" value="<?php displayId(); ?>" readonly> </td> 
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
    <td><TEXTAREA ROWS="10" COLS="30" id="ta" name="txtDescription" class="form-control form_element"></TEXTAREA></td> 
  </tr>

  <tr>
    <td bgcolor=" #D8DFE6" style="text-align:right;"> <label> Attachments : &nbsp;</label></td>
    <td><input id="attachment" name="attachment" class="element file" type="file" size="30" style="color:red;"/> </td> 
  </tr>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;"> Owner : &nbsp;</th>
    <td>
      <select name="owner">
        <option value="noEntry" selected >«No Entry»</option>
        <?php 
          loadOwner($_SESSION['project']);
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
        <option value="submitted" selected>Submitted</option>
        <option value="open">Open</option>
        <option value="fixed">Fixed</option>
        <option value="closed">Closed</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Environment : &nbsp;</label></td>
    <td>
      <select name="environment">
        <option value="noEntry" selected>«No Entry»</option>
        <option value="development">Development</option>
        <option value="test">Test</option>
        <option value="staging">Staging</option>
        <option value="production">Production</option>
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
        <option value="noEntry" selected>«No Entry»</option>
        <option value="Resolve Immediately" >1 - Resolve Immediately</option>
        <option value="High Attention" >2 - High Attention</option>
        <option value="Normal" >3 - Normal</option>
        <option value="Low" >4 - Low</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Severity :&nbsp;</label></td>
    <td>
      <select name="severity">
        <option value="noEntry" selected>«No Entry»</option>
        <option value="1" >1 - Crash/Data Loss</option>
        <option value="2" >2 - Major Problem</option>
        <option value="3" >3 - Minor Problem</option>
        <option value="4" >4 - Cosmetic</option>
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
      <select name="submittedBy" style="width:160px">
        <option value="<?php echo $_SESSION['email'] ?>" selected><?php echo $_SESSION['fName']."&nbsp;".$_SESSION['lName'][0].'.'; ?></option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Creation Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtCreationDate" class="form-control" style="border: none; box-shadow: none;" value="<?php echo date("m/d/Y"); ?>" readonly>
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Found In : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtFoundIn" class="form-control" style="width:200px">
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Fixed In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtFixedIn" class="form-control" style="width:200px">
    </td>
  </tr>
  
  </table>

    <tr><th bgcolor="#D8DFE6" style="text-align:right;">Target Build : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <input type="text" id="txt" name="txtTargetBuild" class="form-control" style="width:200px">
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Verified In : &nbsp;</label></td>
    <td>
      <input type="text" id="txt" name="txtVerifiedIn" class="form-control" style="width:200px">
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
        <option value="noEntry" selected>«No Entry»</option>
        <option value="architecture" >Architecture</option>
        <option value="codeChange" >Code Change</option>
        <option value="configurationChange" >Configuration Change</option>
        <option value="databaseChange" >Database Change</option>
        <option value="duplicate" >Duplicate</option>
        <option value="needMoreInformation" >Need More Information</option>
        <option value="notDefect" >Not a Defect</option>
        <option value="softwareLimitation" >Software Limitation</option>
        <option value="userInterface" >User Interface</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Target Date : &nbsp;</label></td>
    <td>
      <input type="text" id="txtTargetDate" name="txtTargetDate" class="form-control" placeholder="Select a date">
    </td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Affects Doc : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "affectsDoc" value = "1" name = "affectsDoc" /></td> 
  </tr>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>User Story : &nbsp;</label></td>
    <td>
      <table>
        <tr>
          <td>
            <select name="userStory" required>
              <option value="" selected>«No Entry»</option>
                <?php 
                  loadUserStory($_SESSION['project']);
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
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">Schedule</font></td>
  </tr>

  <tr><th bgcolor="#2E64FE" style="text-align:right;"><label style="color: FFFFFF"> Schedule State : &nbsp;</label></th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>
      <select name="scheduleState">
        <option value="Defined" selected>Defined</option>
        <option value="In-Progress" >In-Progress</option>
        <option value="Completed" >Completed</option>
        <option value="Accepted" >Accepted</option>
      </select>
    </td> 
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         </td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked : &nbsp;</label></td>
    <td>&nbsp;<input type = "checkbox" id = "blocked" value = "1" name = "blocked" onclick="enableText(this.checked, 'txtBlockedReason');"/></td>
  </tr>
  
  </table>

  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Ready : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td>&nbsp;<input type = "checkbox" id = "ready" value = "1" name = "ready" /></td>
    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;</td>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Blocked Reason : &nbsp;</label></td>
    <td><input type="text" id="txtBlockedReason" name="txtBlockedReason" class="form-control" style="width:200px" disabled></td>
  </tr>
  
  </table>

  <tr>
    <td bgcolor="#D8DFE6" style="text-align:right;"><label>Iteration : &nbsp;</label></td>
    <td>
      <select name="iteration" >
        <option value="unscheduled" selected>«Unscheduled»</option>
        <?php 
          loadIterations($_SESSION['project']);
        ?>
      </select>
    </td> 
  </tr>


  <tr><th bgcolor="#D8DFE6" style="text-align:right;">Plan Estimate : &nbsp;</th>
    <td colspan="3"> 
      <table>
  </tr>

  <tr> 
    <td><input type="text" id="txt" name="txtPlanEstimate" class="form-control" style="width:100px"></td>
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
        <button style="width:120px" type="submit" name="save" id="save">Save & New </button>
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

//display defect id function
function displayId(){
      
      $result = mysql_query("select * from defect");

      if(mysql_num_rows($result)>0){
        $array = array();

        while ($row = mysql_fetch_array($result)) {
          $num = explode("-", $row['id']);
          array_push($array,$num[1]);
        }

        $max=max($array);
        echo "DF-".++$max;
      }
      else{
        echo "DF-1";
      }
  }

//load user stories according to selected project
function loadUserStory($se_project)
{
  $result = mysql_query("SELECT * from userstory where pname ='$se_project'");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['ID'] .'">' . $row['Name'] .'</option>';
    }
}

//load iterations in the selected project
function loadIterations($se_project)
{
    $result = mysql_query("select * from iteration where project='$se_project'");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
      }
}

//load members in the team assigned to selected project
function loadOwner($se_project)
{
    $result = mysql_query("SELECT DISTINCT u.fName,u.lName,u.username FROM users u, newteam t WHERE u.username = t.userName AND t.projectName =  '$se_project' ORDER BY u.fName, u.lName ASC ");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['username'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
      }
}

?>
