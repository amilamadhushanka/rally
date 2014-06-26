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
    ?>

    <script>
      function openWin()
      {
        window.open("http://localhost/Rally_CI/addDefect_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
      }

      function openWin1()
      {
        window.open("http://localhost/Rally_CI/AddUs_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
      }

      function openWinTask()
      {
        window.open("http://localhost/Rally_CI/newtask","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=220, width=1000, height=640");
      }
    </script>

    <script type="text/javascript">
      function changeFunc() {
        var project = document.getElementById("view");
        var selectedValue = project.options[project.selectedIndex].value;
        
        if(selectedValue=="us"){
          window.location.href ="http://localhost/Rally_CI/backlog/view_userStories"
        }
        else if(selectedValue=="df"){
          window.location.href ="http://localhost/Rally_CI/backlog/view_defects"
        }
        else if(selectedValue=="all"){
          window.location.href ="http://localhost/Rally_CI/backlog"
        }
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


  <table>
    <col width="20">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="817">
    <tr>
      <td>
        &nbsp;<span class="glyphicon glyphicon-plus" style="color:blue"></span> 
      </td>
      <td>
          <form>
            <button onclick="openWin1()" class="btn btn-default btn-lg">Add New Userstory</button>
          </form> 
        </td>
        <td >&nbsp;</td>
        <td>
          <form>
            <button onclick="openWin()" class="btn btn-default btn-lg">Add New Defect</button>
          </form>
        </td>
        <td >&nbsp;</td>
        <td>
          <form>
          <button onclick="openWinTask()" class="btn btn-default btn-lg">Add New Task</button>
          </form>
        </td>
      <td style="text-align:right;">Show:&nbsp;
        <td>
          <select id="view" name="view" onChange="changeFunc();">
            <option value="none" selected="true" style="display:none;">Show</option>
            <option value="us">User Stories</option>
            <option value="df">Defects</option>
            <option value="all" selected>All</option>
        </td>
      </td>
    </tr>
  </table>


  <br>
  <div>
    <?php
      loadAll();
    ?>

  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadAll(){

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.priority,d.owner,u.fName,u.lName FROM defect d,users u WHERE d.owner=u.username ORDER BY d.priority ASC";
    $result = mysql_query($query);

    $query_US = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,u.fName,u.lName FROM userstory s,users u WHERE s.Owner=u.username ORDER BY s.Priority ASC";
    $result_US = mysql_query($query_US);

    echo '<center>
          <div class="datagrid" style="width:1320px">
          <table id="defectsTable">
            <thead>
            <tr>
              <th width="10%">ID</th>
              <th width="40%">NAME</th>
              <th width="10%">PLAN ESTIMATE</th>
              <th width="20%">PRIORITY</th>
              <th width="20%">OWNER</th>
            </tr>
            </thead>';

    while($row1 = mysql_fetch_array($result_US)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row1['ID'] . "</td><td>" . $row1['Name'] . "</td><td>" . $row1['Plan_estima'] . "</td>
            <td>" . $row1['Priority'] . "</td><td>" . $row1['fName'] . '&nbsp;' . $row1['lName'] . "</td></tr></tbody>";  //$row['index'] the index here is a field name
    }

    $query_US = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner FROM userstory s,users u WHERE s.Owner='noEntry' ORDER BY s.Priority ASC";
    $result_US = mysql_query($query_US);

    while($row1 = mysql_fetch_array($result_US)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row1['ID'] . "</td><td>" . $row1['Name'] . "</td><td>" . $row1['Plan_estima'] . "</td>
            <td>" . $row1['Priority'] . "</td><td>".'&nbsp;'."</td></tr></tbody>";  //$row['index'] the index here is a field name
    }


    //View Defects
    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['planEstimate'] . "</td>
            <td>" . $row['priority'] . "</td><td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td></tr></tbody>";  //$row['index'] the index here is a field name
    }

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.priority,d.owner FROM defect d,users u WHERE d.owner='noEntry' ORDER BY d.priority ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['planEstimate'] . "</td>
            <td>" . $row['priority'] . "</td><td>".'&nbsp;'."</td></tr></tbody>";  //$row['index'] the index here is a field name
    }


    echo "</table></div>
          </center>";

    mysql_close();
  }



?>
