<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>
    <!--<link href="css/User_Story.css" rel="stylesheet"> -->

    <title>Backlog</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/User_Story.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <li><a href="messages.php" onclick="javascript:void window.open('http://localhost/rally/messages.php','1395886764992','width=500,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Messages</a></li>
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

$SQL = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,s.Rank,s.pname,u.fName,u.lName FROM userstory s,users u WHERE s.Owner=u.username ORDER BY s.Priority ASC";
$result = mysql_query($SQL);



echo '<div>
  <!-- Default panel contents -->
      
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
            <button onclick="openWin2()" class="btn btn-default btn-lg">Add New Defect</button>
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
            <option value="us" selected>User Stories</option>
            <option value="df">Defects</option>
            <option value="all">All</option>
        </td>
      </td>
    </tr>
  </table>

      <br>


      <script>
        function openWin1()
        {
          window.open("http://localhost/Rally_CI/AddUs_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

        function openWin2()
        {
          window.open("http://localhost/Rally_CI/addDefect_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

         function openWinTask()
        {
          window.open("http://localhost/Rally_CI/newtask","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

        
      </script>
        ';

     echo "
     
     <div> 
  <!-- Table -->
      <center>
      <div class='datagrid' style='width:1320px'>
      <table id='iterationTable' >
          <thead><tr> 
          <th width='10%' align='center'> ID </th>
          <th width='35%' align='center'> Name </th>
          <th width='10%' align='center'> Plan-Estima </th>
          <th width='15%' align='center'> Priority </th>
          <th width='20%' align='center'> Owner </th>
          <th width='5%' align='center'> Edit </th>
          <th width='5%' align='center'> DELETE </th>
        </tr></thead>
      ";



while (($db_field = mysql_fetch_assoc($result)))
{
  
  echo "
    
     <tbody><tr class='alt'>
      <td width='10%' align='center'>".$db_field['ID']."</td>
      <td width='35%' align='center'>".$db_field['Name']."</td>
      <td width='10%' align='center'>".$db_field['Plan_estima']."</td>
      <td width='15%' align='center'>".$db_field['Priority']."</td>
      <td width='20%' align='center'>".$db_field['fName'].'&nbsp;' . $db_field['lName'] ."</td>
      <td width='5%' align='center'> <a href='http://localhost/Rally_CI/editUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>
      <td width='5%' align='center'> <a href='http://localhost/Rally_CI/deleteUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>


    </tr> 
    </tbody>
  

  ";
 
}

  $SQL = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,s.Rank,s.pname FROM userstory s,users u WHERE s.Owner='noEntry' ORDER BY s.Priority ASC";
  $result = mysql_query($SQL);

  while (($db_field = mysql_fetch_assoc($result)))
{
  
  echo "
   
     <tbody><tr class='alt'>
      <td width='10%' align='center'>".$db_field['ID']."</td>
      <td width='35%' align='center'>".$db_field['Name']."</td>
      <td width='10%' align='center'>".$db_field['Plan_estima']."</td>
      <td width='15%' align='center'>".$db_field['Priority']."</td>
      <td width='20%' align='center'>".'&nbsp;'."</td>
      <td width='5%' align='center'> <a href='http://localhost/Rally_CI/editUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>
      <td width='5%' align='center'> <a href='http://localhost/Rally_CI/deleteUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>


    </tr> 
    </tbody>
  

  ";
 
}

echo '</table>
      </div>
      </center>
      
      </div>
      
    </div>';





mysql_close($connection);

}
else {
print "Database NOT Found ";
mysql_close($connection);
}


echo '<script>myfunction()</script>';

?>

</html>
