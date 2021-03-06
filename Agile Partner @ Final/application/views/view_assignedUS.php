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

    <title>Backlog</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>

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
        <li ><a href="http://agilepartner.comxa.com/index.php/backlog">BACKLOG</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/plan">PLAN</a></li>
        <li ><a href="#">TRACK</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/testCases">QUALITY</a></li>
        <li ><a href="#">REPORTS</a></li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://agilepartner.comxa.com/index.php/createTeam">Setup</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Settings</a></li>
            <li><a href="messages.php" onclick="javascript:void window.open('http://agilepartner.comxa.com/index.php/messages','1395886764992','width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Messages</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="http://agilepartner.comxa.com/index.php/logout"><font color="blue">Sign Out</font></a></li>
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
          <?php
            loadIterationDetails($iteration);
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

  function loadIterationDetails($iteration){

    $query = "SELECT u.ID,u.name,d.Plan_estima,u.state,u.description FROM assign_userstory_to_iteration ai,userstory u WHERE u.ID=ai.userstory AND ai.iteration='$iteration' ORDER BY u.ID ASC";
    $result = mysql_query($query);

    echo '&nbsp;&nbsp; <b>Defects assigned for iteration : </b> <b style="color: blue; font-size:16px">'.$iteration.'</b>';
    echo '<center><br><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="5%">ID</th>
              <th width="25%">NAME</th>
              <th width="45%">DESCRIPTION</th>
              <th width="5%">Est</th>
              <th width="15%">STATE</th>
              <th width="5%">REMOVE</th>
            </tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['ID'] . "</td><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td>" . $row['Plan_estima'] . "</td><td>" . $row['state'] . "</td><td><a href='http://agilepartner.comxa.com/index.php/assignedDF_US/remove/". $row['ID'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>
             </tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>
