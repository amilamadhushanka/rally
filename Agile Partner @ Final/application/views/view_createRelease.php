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
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

  

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <!--Display date chooser-->

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    
    <script type="text/javascript">
       $(function() {
         $( "#startDate" ).datepicker();
         $( "#releaseDate" ).datepicker();
      });
    </script>
    

</head>

<body>

  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Release</h3>

<br>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/createRelease" >

<div style="height:400px; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF">Project Name &nbsp;</label></td>
    <td>
      <input type="text" id="project" name="project" readonly value="<?php echo $_SESSION['project']; ?>" class="form-control" style="width:450px; margin-top:5px; border: none; box-shadow: none" >
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF"> Release Name  &nbsp;</label></td>
    <td><input type="text" id="name" name="name" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

<tr>
  <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Start Date : &nbsp;</label></td>
    <td>
      <input type="text" id="startDate" name="startDate" class="form-control" placeholder="Select a date">
    </td>

  </tr> 

<tr>
  <td bgcolor="#D8DFE6" style="text-align:right;"><label style="width:200px"> Release Date : &nbsp;</label></td>
    <td>
      <input type="text" id="releaseDate" name="releaseDate" class="form-control" placeholder="Select a date">
    </td>
  </tr>

<tr><td style="text-align:right;" bgcolor="#D8DFE6"> State  &nbsp;</label></td>
  
      
 
    <td>
      <select name="state">
        <option value="noEntry" selected>«No Entry»</option>
        <option value="plnning" >Planning</option>
        <option value="active" >Active</option>
        <option value="accepted" >Accepted</option>
      </select>
    </td> 
</tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> Planned Velocity  &nbsp;</label></td>
    <td><input type="text" id="plannedVelocity" name="plannedVelocity" class="form-control" style="width:450px; margin-top:5px;" ></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Version  &nbsp;</label></td>
    <td><input type="text" id="version" name="version" class="form-control" style="width:450px; margin-top:5px;" ></td>
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

  

function loadProject()
{
  $result = mysql_query("select * from project");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
}

?>

