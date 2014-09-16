<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>Assign Testcase to a Member</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
    ?>

  </head>

  <body>
  <br>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Testcase</h3>



<form class="form-defect" role = "form" method = "post" >

<div style="height:200; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">
<br>

  <div>
      <?php
        loadTestcase($_SESSION['project']);
        //echo $selected_project;
      ?>
  </div>
<br>
<br>
<br>
<br>
</div>

  <center>
  <table>
    <tr>
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>
  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadTestcase($project){

    $query = "SELECT * FROM testcase t, userstory s WHERE t.TC_Owner =  'noEntry' AND t.USid=s.ID AND t.pname =  '$project'";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:800px">
          <table id="defectsTable" class="table_US" >
             <thead><tr>
              <th width="10%">ID</th>
              <th width="10%">Iteration Name</th>
              <th width="30%">Testcase</th>
              <th width="35%">Userstory</th>
              <th width="10%">Priority</th>
              <th width="5%">Assign</th>
            </tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['TC_id'] . "</td><td>" . $row['IterationName'] . "</td><td>" . $row['TC_Name'] . "</td><td>" . $row['Name'] . "</td>
            <td>" . $row['TC_Priority'] . "</td><td><a href='http://agilepartner.comxa.com/index.php/assignTestcaseToMember/get_values/". $row['TC_id'] ."/". $row['ID'] ."/". $row['IterationName'] ."/". $row['pname'] ."'> <img src='".base_url('assets\images\assign_icon.png')."'></img> </a></td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";

  }

?>
