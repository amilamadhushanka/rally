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
      echo link_tag('assets/css/iterationTable.css');
    ?>

    <script>
        function openWin()
        {
          window.open("http://localhost/Rally_CI/createIteration","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=100, left=175, width=1000, height=480");
        }
    </script>

    <script>
        function openWinUS()
        {
          window.open("http://localhost/Rally_CI/usAssignedToIteration_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=150, left=175, width=1000, height=350");
        }
    </script>
    <script>
        function openWinDF()
        {
          window.open("http://localhost/Rally_CI/assignedToIteration_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=150, left=175, width=1000, height=350");
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

  <div>
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
                <td>
                  &nbsp;<button class="btn btn-default btn-lg" onclick="openWin()">Create Iteration</button>
                </td>
                <td>
                  &nbsp;<button class="btn btn-default btn-lg" onclick="openWinUS()">Assign Userstory to a Iteration</button>
                </td>
                <td>
                  &nbsp;<button class="btn btn-default btn-lg" onclick="openWinDF()">Assign Defect to a Iteration</button>
                </td>
              </tr>
            </table>
          </form>
          <br>
          <?php
            loadIterations();
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

  function loadIterations(){

    $query = "SELECT * FROM iteration ORDER BY name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">NAME</th>
              <th width="15%">START DATE</th>
              <th width="15%">END DATE</th>
              <th width="10%">DAYS</th>
              <th width="15%">PLANNED VELOCITY</th>
              <th width="5%">EDIT</th>
              <th width="5%">DELETE</th>
              <th width="5%">DETAILS</th>
            </tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td>
            <td>" . $row['days'] . "</td><td>" . $row['PlannedVelocity'] . "</td><td><a href='http://localhost/Rally_CI/editIteration/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td><td><a href='http://localhost/Rally_CI/deleteIteration/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>
             <td><a href='http://localhost/Rally_CI/assignedDF_US/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\view_icon.png')."' > </img> </a></td></tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>
