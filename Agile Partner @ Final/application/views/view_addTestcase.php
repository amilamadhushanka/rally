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
    
    <title>Testcase</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

  

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    

</head>

<body>

  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Testcase</h3>



<form class="form-iteration" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/addTestcase" >

<div style="height:540px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF">Project Name &nbsp;</label></td>
    <td>
      <input type="text" id="pname" name="pname" readonly value="<?php echo $_SESSION['project']; ?>" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" >
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Iteration Name &nbsp;</label></td>
    <td>
      <select name="iName" style="margin-top:5px;">
        <option value="" selected="true" style="display:none; ">«Select Iteration»</option>
        <?php 
          loadIterations();
        ?>
      </select>
    </td> 
  </tr>

  

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>User Story &nbsp;</label></td>
    <td>
      <select name="uid" required style="margin-top:5px;">
              <option value="" selected="true" style="display:none; ">«Select Userstory»</option>
                <?php 
                  loadUserStory();
                ?>
      </select>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Testcase ID &nbsp;</label></td>
    <td>
      <input type="text" id="tcid" name="tcid" class="form-control" style="width:100px; margin-top:5px; border: none; box-shadow: none" value="<?php displayId(); ?>" readonly>
    </td> 
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF"> Testcase Name  &nbsp;</label></td>
    <td><input type="text" id="tcName" name="tcName" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Work Product  &nbsp;</label></td>
    <td><input type="text" id="workProduct" name="workProduct" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Type  &nbsp;</label></td>
    <td>
      <select name="type" style="width:200px; margin-top:5px;">
        <option value="noEntry" selected="true" style="display:none; " >«Select Type»</option>
        <option value="Installation testing">Installation testing</option>
        <option value="Compatibility testing">Compatibility testing</option>
        <option value="Smoke and sanity testing">Smoke and sanity testing</option>
        <option value="Regression testing">Regression testing</option>
        <option value="Acceptance testing">Acceptance testing</option>
        <option value="Alpha testing">Alpha testing</option>
        <option value="Beta testing">Beta testing</option>
        <option value="Functional testing">Functional testing</option>
        <option value="Non-functional testing">Non-functional testing</option>
        <option value="Destructive testing">Destructive testing</option>
        <option value="Software performance testing">Software performance testing</option>
        <option value="Usability testing">Usability testing</option>
        <option value="Security testing">Security testing</option>
        <option value="Internationalization and localization">Internationalization and localization</option>
        <option value="Development testing">Development testing</option>
        <option value="Concurrent testing">Concurrent testing</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Testcase Priority  &nbsp;</label></td>
    <td><input type="text" id="tcPriority" name="tcPriority" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Testcase Owner  &nbsp;</label></td>
    <td>
      <select name="tcOwner" style="width:200px; margin-top:5px;">
        <option value="noEntry" selected="true" style="display:none; " >«Select Owner»</option>
        <?php 
          loadOwner();
        ?>
      </select>
    </td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Method  &nbsp;</label></td>
    <td>
      <select name="method" style="width:200px; margin-top:5px;">
        <option value="noEntry" selected="true" style="display:none; " >«Select Method»</option>
        <option value="Manual">Manual</option>
        <option value="Automated">Automated</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Last Verdict  &nbsp;</label></td>
    <td><input type="text" id="lastVerdict" name="lastVerdict" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Last Built  &nbsp;</label></td>
    <td><input type="text" id="lastBuilt" name="lastBuilt" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Last Run  &nbsp;</label></td>
    <td><input type="text" id="lastRun" name="lastRun" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo date("m/d/Y"); ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Pre Condition  &nbsp;</label></td>
    <td><TEXTAREA ROWS="3" COLS="30" id="ta" name="txtPreCondition" class="form-control form_element" style="width:450px; margin-top:5px;"></TEXTAREA></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Test Procedure  &nbsp;</label></td>
    <td><TEXTAREA ROWS="3" COLS="30" id="ta" name="txtTestProcedure" class="form-control form_element" style="width:450px; margin-top:5px;"></TEXTAREA></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Test Inputs  &nbsp;</label></td>
    <td><TEXTAREA ROWS="3" COLS="30" id="ta" name="txtTestInputs" class="form-control form_element" style="width:450px; margin-top:5px;"></TEXTAREA></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Expected Results  &nbsp;</label></td>
    <td><TEXTAREA ROWS="3" COLS="30" id="ta" name="txtExpectedResults" class="form-control form_element" style="width:450px; margin-top:5px;"></TEXTAREA></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Testcase Status  &nbsp;</label></td>
    <td>
      <select name="testcaseStatus" style="width:100px; margin-top:5px;">
        <option value="noEntry" selected="true" style="display:none; " >«Select»</option>
        <option value="pass">Pass</option>
        <option value="fail">Fail</option>
      </select>
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
        <button style="width:120px" type="submit" name="save" id="save">Save & New </button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
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

//display testcase id function
function displayId(){
      
      $result = mysql_query("select * from testcase");

      if(mysql_num_rows($result)>0){
        $array = array();

        while ($row = mysql_fetch_array($result)) {
          $num = explode("-", $row['TC_id']);
          array_push($array,$num[1]);
        }

        $max=max($array);
        echo "TC-".++$max;
      }
      else{
        echo "TC-1";
      }
  }

  //load members in the team assigned to selected project
function loadOwner()
{
    $result = mysql_query("select distinct fName,lName,username from users");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['username'] .'">' . $row['fName'].'&nbsp;'.$row['lName'] .'</option>';
      }
}

function loadProject()
{
  $result = mysql_query("select * from project");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
}

//load user stories according to selected project
function loadUserStory()
{
  $result = mysql_query("SELECT * from userstory");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['ID'] .'">' . $row['Name'] .'</option>';
    }
}

//load iterations in the selected project
function loadIterations()
{
    $result = mysql_query("select * from iteration");

      while ($row = mysql_fetch_array($result)) {
        echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
      }
}

?>

