<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>View Unassign STask</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>


  </head>

  <body>
  <div>
    
    <table align = "left" border="0" style="width:auto">
      <col width="500">
      <col width="500">
      <tr> 
        <td>
           <form>
            
            <table>
              
            </table>
          </form>
          <br>
          <?php
            loadTask($selected_project); //get parsed value from controller
          ?>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp;
        </td>
      </tr>
    </table>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>


  </body>

</html>


<?php

  function loadTask($selectedProject){

    $query = "SELECT * FROM newtask t  WHERE t.project_name='$selectedProject' AND t.owner IS NULL ";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:950px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">TASK NAME</th>
              <th width="30%">DESCRIPTION</th>
              <th width="20%">ASSIGN</th>
              
            </tr>
            </thead>';


while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['task_name'] . "</td>
      <td>" . $row['description'] . "</td> <td><a href='http://localhost/Rally_CI/index.php/Assign_UnAssignTask/get_values/". $row['task_name'] ."'>
      <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td>
            
             </tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>
