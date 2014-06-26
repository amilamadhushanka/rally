<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>WORKSPACES & PROJECTS</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
    ?>

    <script>
      function openWin()
      {
        window.open("http://localhost/Rally_CI/newProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
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

  </div><!-- /.container-fluid -->

  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/Rally_CI/home"><?php echo "<img src='".base_url('assets\images\home_icon.png')."'>"; ?></a></li>
        <li ><a href="createTeam">USERS</a></li>
        <li ><a href="projects">WORKSPACES & PROJECTS</a></li>
        <li ><a href="#">SUBSCRIPTION</a></li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/Rally_CI/backlog"><?php echo "<img src='".base_url('assets\images\settings_icon.png')."'>"; ?> Setup</a></li>
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
            <button onclick="openWin()" class="btn btn-default btn-lg">Add New Project</button>
          </form> 
      </td>
    </tr>
  </table>


  <div>
    <br>
      <?php
        loadAssignedDefects();
      ?>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadAssignedDefects(){

    $query = "SELECT * FROM project ORDER BY name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="defectsTable" class="table_US" >
             <thead><tr>
              <th width="30%">PROJECT NAME</th>
              <th width="40%">DESCRIPTION</th>
              <th width="10%">STATE</th>
              <th width="20%">OWNER</th>
              <th width="20%">Edit</th>

            </tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['discription'] . "</td><td>" . $row['state'] . "</td>
            <td>" . $row['owner'] . "</td><td>   <a href='http://localhost/Rally_CI/editProject/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a>  </td></tr> 
              </tbody>";  
    }

    // 'http://localhost/Rally_CI/editDefect/get_values/". $row['id'] ."'

    echo "</table>
          </div>
          </center>";

  }

?>
