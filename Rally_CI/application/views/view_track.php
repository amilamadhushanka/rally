<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>Backlog</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
      echo link_tag('assets/css/trackTable.css');
    ?>

    <script>
      function openWin()
      {
        var selectedValue = iteration.options[iteration.selectedIndex].value;
        url="http://localhost/Rally_CI/track/loadDetails/"+selectedValue;
        window.location.assign(url);
      }
    </script>

  </head>

  <body>

  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/Rally_CI/home"><?php echo "<img src='".base_url('assets\images\home_icon.png')."'>"; ?></a></li>
        <li ><a href="http://localhost/Rally_CI/backlog">BACKLOG</a></li>
        <li ><a href="http://localhost/Rally_CI/plan">PLAN</a></li>
        <li ><a href="http://localhost/Rally_CI/viewTasks">TASKS</a></li>
        <li ><a href="http://localhost/Rally_CI/track">TRACK</a></li>
        <li ><a href="http://localhost/Rally_CI/testCases">QUALITY</a></li>
        <li ><a href="#">REPORTS</a></li>
       
      </ul>
      
       <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/Rally_CI/createTeam"><?php echo "<img src='".base_url('assets\images\settings_icon.png')."'>"; ?> Setup</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
              echo "<img src='".base_url('assets\images\user_icon.png')."'>";
            ?>
              <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Settings</a></li>
            <li><a href="http://localhost/Rally_CI/message" onclick="javascript:void window.open('http://localhost/Rally_CI/message','1395886764992','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Messages</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="http://localhost/Rally_CI/logout"><font color="blue">Sign Out</font></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<form >

<font>&nbsp;&nbsp;&nbsp;Iteration Status :&nbsp;</font>
<select id="iteration" name="iteration">
  <?php
    loadIterations($selected_iteration);
  ?>
</select>
&nbsp;
<button name="load" type="button" onclick="openWin()">Load</button>

<br><br>

  <center>
  <div class="datagrid" style="width:1350px;">
    <table id="defectsTable" >
      <thead><tr>
        <th width="338px">Defined</th>
        <th width="337px">In-Progress</th>
        <th width="342px">Completed</th>
        <th width="331px">Accepted</th>
        <th width="1px">&nbsp;</th>
      </tr>
      </thead>
    </table>
  </center>
  <center>
    <div class="datagrid" style="width:1350px; height:470px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">
    <table id="defectsTable">
      <tr>
        <td valign="top" width="25%">
          <?php
            if(isset($selected_iteration)){
              loadDefined($selected_iteration);
            }
          ?>
        </td>
        <td valign="top" width="25%">
          <?php
            if(isset($selected_iteration)){
              loadInProgress($selected_iteration);
            }
          ?>
        </td>
        <td valign="top" width="25%">
          <?php
            if(isset($selected_iteration)){
              loadCompleted($selected_iteration);
            }
          ?>
        </td>
        <td valign="top" width="25%">
          <?php
            if(isset($selected_iteration)){
              loadAccepted($selected_iteration);
            }
          ?>
        </td>
      </tr>
    </table>
      </div>
  </div>
  </center>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadDefined($iteration){

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,a.iteration FROM defect d,users u, assign_defect_to_iteration a 
              WHERE d.owner=u.username AND d.scheduleState='Defined' AND a.defect=d.id AND a.iteration='$iteration' ORDER BY d.id ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo '<center><div class="datagrid1" style="width:150">
          <table id="defectsTable" >
             <!-- <thead><tr>
              <th width="15%">ID</th>
              <th width="50%">Name</th>
              <th width="10%">Days</th>
              <th width="20%">Owner</th>
              <th width="5%"></th>
            </tr> </thead> -->';

            $lastName=$row['lName'][0].'.';
            
            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

      echo "<tbody><tr class='alt'><td height='80'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
            <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://localhost/Rally_CI/track/moveToInProgress/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\assign_icon.png')."' > 
            </img> </a></td></tr></tbody>";

      echo "</table>
          </div>
          </center>";

      echo '<br>';
    }
  }

  function loadInProgress($iteration){

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,a.iteration FROM defect d,users u, assign_defect_to_iteration a 
              WHERE d.owner=u.username AND d.scheduleState='In-Progress' AND a.defect=d.id AND a.iteration='$iteration' ORDER BY d.id ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo '<center><div class="datagrid1" style="width:150">
          <table id="defectsTable" >
             <!-- <thead><tr>
              <th width="15%">ID</th>
              <th width="45%">Name</th>
              <th width="10%">Days</th>
              <th width="20%">Owner</th>
              <th width="5%"></th>
              <th width="5%"></th>
            </tr> </thead> -->';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

      echo "<tbody><tr class='alt'><td height='80'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
            <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://localhost/Rally_CI/track/moveToDefined/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\unassign_icon.png')."' > 
            </img> </a></td><td><a href='http://localhost/Rally_CI/track/moveToCompleted/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\assign_icon.png')."' > 
            </img> </a></td></tr></tbody>";

      echo "</table>
          </div>
          </center>";

      echo '<br>';
    }
  }

  function loadCompleted($iteration){

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,a.iteration FROM defect d,users u, assign_defect_to_iteration a 
              WHERE d.owner=u.username AND d.scheduleState='Completed' AND a.defect=d.id AND a.iteration='$iteration' ORDER BY d.id ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo '<center><div class="datagrid1" style="width:150">
          <table id="defectsTable" >
             <!-- <thead><tr>
              <th width="15%">ID</th>
              <th width="45%">Name</th>
              <th width="10%">Iteration</th>
              <th width="20%">Owner</th>
              <th width="5%"></th>
              <th width="5%"></th>
            </tr> </thead> -->';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

      echo "<tbody><tr class='alt'><td height='80'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
            <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://localhost/Rally_CI/track/moveToInProgress/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\unassign_icon.png')."' > 
            </img> </a></td><td><a href='http://localhost/Rally_CI/track/moveToAccepted/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\assign_icon.png')."' > 
            </img> </a></td></tr></tbody>";

      echo "</table>
          </div>
          </center>";

      echo '<br>';
    }
  }

  function loadAccepted($iteration){

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.owner,d.creationDate,u.fName,u.lName,a.iteration FROM defect d,users u, assign_defect_to_iteration a 
              WHERE d.owner=u.username AND d.scheduleState='Accepted' AND a.defect=d.id AND a.iteration='$iteration' ORDER BY d.id ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo '<center><div class="datagrid1" style="width:150">
          <table id="defectsTable" >
             <!-- <thead><tr>
              <th width="15%">ID</th>
              <th width="50%">Name</th>
              <th width="10%">Iteration</th>
              <th width="20%">Owner</th>
              <th width="5%"></th>
            </tr> </thead> -->';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

      echo "<tbody><tr class='alt'><td height='80'>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
            <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://localhost/Rally_CI/track/moveToCompleted/". $row['id'] ."/". $iteration ."'> <img src='".base_url('assets\images\unassign_icon.png')."' > 
            </img> </a></td></tr></tbody>";

      echo "</table>
          </div>
          </center>";

      echo '<br>';
    }
  }

  //load iterations in the selected project
  function loadIterations($iteration)
  { 
    if($iteration){
      echo '<option value="'.$iteration.'" selected>' . $iteration .'</option>'; //set selected
    }

    $result = mysql_query("select DISTINCT name from iteration where name!='$iteration'");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'" >' . $row['name'] .'</option>';
    }
      
  }
  

?>
