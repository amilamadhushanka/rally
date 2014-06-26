<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>Test Cases</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/User_Story.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



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

<div class="input-group">
          
  
          
</div>


   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
    
  </body>

  <?php


$dbserver="localhost";
$username="root";
$mydb="rally";
$connection=mysql_connect("$dbserver","$username")or die("could not connect to the server");
$db_found = mysql_select_db($mydb,$connection);


if ($db_found) {

$SQL = "SELECT * FROM testcase t, users u WHERE t.TC_Owner=u.username";
$result = mysql_query($SQL);


echo '<div >
  <!-- Default panel contents -->

      <table>
      <tr> 
        <td>
          <form>
            &nbsp;<span class="glyphicon glyphicon-plus" style="color:blue"></span> 
            <button onclick="openWin1()" class="btn btn-default btn-lg">Add New Testcase</button>
          </form> 
        </td>
        <td >&nbsp;</td>
        
      </tr>
      <tr>
        <td >&nbsp;</td>
      </tr>
  
      </table>

      <script>
        function openWin1()
        {
          window.open("addTestcase_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

        
      </script>
        
     
     <form class="navbar-form navbar-left">
     <div class="form-group">  
  <!-- Table -->
      <div class="datagrid" style="width:1250px">
      <table id="iterationTable">
          <thead><tr> 
          <th  align="center"> Testcase ID </th>
          <th  align="center"> Testcase Name </th>
          <th  align="center"> Iteration Name</th>
          <th  align="center"> User Story ID </th>
          <th  align="center"> Work Product </th>
          <th  align="center"> Type </th>
          <th  align="center"> Testcase Priority </th>
          <th  align="center"> Testcase Owner </th>
          <th  align="center"> Method </th>
          <th  align="center"> Last Verdict </th>
          <th  align="center"> Last Built </th>
          <th align="center"> Last Run </th>
          <th align="center"> Edit </th>
          <th align="center"> Delete </th>
        </tr></thead>
      ';



while ($db_field = mysql_fetch_assoc($result))
{

  echo "
     <tbody><tr class='alt'>
      <td align='center'>".$db_field['TC_id']."</td>
      <td align='center'>".$db_field['TC_Name']."</td>
      <td align='center'>".$db_field['IterationName']."</td>
      <td align='center'>".$db_field['USid']."</td>
      <td align='center'>".$db_field['WorkProduct']."</td>
      <td align='center'>".$db_field['Type']."</td>
      <td align='center'>".$db_field['TC_Priority']."</td>
      <td align='center'>".$db_field['fName'].'&nbsp;' . $db_field['lName'] ."</td>
      <td align='center'>".$db_field['Method']."</td>
      <td align='center'>".$db_field['LastVerdict']."</td>
      <td align='center'>".$db_field['LastBuilt']."</td>
      <td align='center'>".$db_field['LastRun']."</td>
      <td align='center'><a href='http://localhost/Rally_CI/editTestcase/get_values/". $db_field['IterationName'] . "/". $db_field['USid'] . "/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>
      <td align='center'><a href='http://localhost/Rally_CI/deleteTestcase/get_values/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>
      
    </tr> </tbody>";
  
}

echo '</table>
      </div>
      
      </form>
      </div>
    </div>';



mysql_close($connection);

}
else {
print "Database NOT Found ";
mysql_close($connection);
}




?>

</html>
