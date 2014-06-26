<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>Edit Team</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>


  </head>

  <body>
  <div>
    <br>
    <b>&nbsp;&nbsp;&nbsp;&nbsp;TEAM NAME : <?php echo $selected_team; ?></b>
    <br><br><br>
    <table align = "left" border="0" style="width:auto">
      <col width="500">
      <col width="500">
      <tr> 
        <td>
           <form>
            
            <table>
              <tr>
                <td>
                  &nbsp;<span class="glyphicon glyphicon-plus" style="color:blue"></span>
                </td>
                <!--
                <td>
                  &nbsp;<button class="btn btn-default btn-lg" >Add Member</button>
                </td>
              -->
                <td>
                  &nbsp;<a href="http://localhost/Rally_CI/addNewMemberToTeam/load/<?php echo $selected_team; ?>/<?php echo $project; ?>" align = "center" > Add Member</a>
                </td>
              </tr>
            </table>
          </form>
          <br>
          <?php
            loadUser($selected_team);
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

  function loadUser($selectedTeam){

    $query = "SELECT * FROM newteam t, users u  WHERE t.teamId='$selectedTeam' AND t.userName=u.username ORDER BY t.userName ASC ";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:950px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">NAME</th>
              <th width="30%">TITLE</th>
              <th width="30%">EMAIL</th>
              <th width="5%">REMOVE</th>
             
            </tr>
            </thead>';


while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['fName'] .'&nbsp;' . $row['lName'] . "</td><td>" . $row['title'] . "</td>
            <td>" . $row['username'] . "</td><td><a href='http://localhost/Rally_CI/editTeam_userList/remove/". $selectedTeam ."/". $row['userName'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>
             </tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>
