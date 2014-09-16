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

    <title>Assign Defects to a Iteration</title>

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
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assign Iteration</h3>



<form class="form-defect" role = "form" method = "post" >

<div style="height:200; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">
<br>

  <div>
      <?php
        loadUserstory($selected_project);
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

  function loadIteration($project){

    $query = "SELECT * FROM iteration WHERE project='$project' AND release_name='unscheduled' AND state!='Commited' AND 
              ID NOT IN (SELECT iteration FROM assign_iteration_to_release) ORDER BY name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:800px">
          <table id="iteration" class="table_US" >
             <thead><tr>
              <th width="25%">NAME</th>
              <th width="30%">START DATE</th>
              <th width="15%">END DATE</th>
              <th width="15%">PLANNED VELOCITY</th>
              <th width="5%">Assign</th>
            </tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td><td>" . $row['PlannedVelocity'] . "</td><td><a href='http://agilepartner.comxa.com/index.php/iterationAssignedToRelease/get_values/". $row['name'] ."/". $row['project'] ."'> <img src='".base_url('assets\images\assign_icon.png')."'></img> </a></td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";

  }

?>
