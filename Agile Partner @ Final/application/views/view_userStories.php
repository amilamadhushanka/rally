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
    <!--<link href="css/User_Story.css" rel="stylesheet"> -->

    <title>Backlog</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/User_Story.css');
      echo link_tag('assets/css/iterationTable.css');
      echo link_tag('assets/css/buttons.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

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
          window.location.href ="http://agilepartner.comxa.com/index.php/backlog/view_userStories"
        }
        else if(selectedValue=="df"){
          window.location.href ="http://agilepartner.comxa.com/index.php/backlog/view_defects"
        }
        else if(selectedValue=="all"){
          window.location.href ="http://agilepartner.comxa.com/index.php/backlog"
        }
      }
  </script>

  <script type="text/javascript">
      function notify(){
      $(document).ready(function () {
        var options1={
          color:'red',
          target: $('#eventPosition'),
          position: {
            x: 'left',
            y: 'top'
          },
          outside: 'x',
          ajax: 'http://agilepartner.comxa.com/index.php/notificationEvent/notifyOnTime',
           reload: true,
          adjustPosition: true,
          adjustTracker: true,
          autoClose:false,
        };
        new jBox('Notice',options1);
      });
    }
    </script>
    
    <script type="text/javascript">
      setInterval(function(){  
      $.ajax({
      type: 'GET',
      url: 'http://agilepartner.comxa.com/index.php/notificationEvent/time',  
      cache: false,
      dataType: 'html',
      success: function(notifications) { 
      var data = notifications;  
        if(data=='1'){
          notify();
        }
      },
      error : function(er){
        //alert("error");
      }
      }); 
      }

      ,4000);
    </script>


  </head>

  <body>

  

<div class="input-group">
          
  
          
</div>




 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>


  </body>

 <?php

$project=$_SESSION['project'];

$SQL = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,s.Rank,s.pname,u.fName,u.lName FROM userstory s,users u WHERE s.Owner=u.username AND pname='$project'ORDER BY s.ID ASC";
$result = mysql_query($SQL);

echo '
  <label id="eventPosition" style="margin-left: 1350px;"></label>

  <label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>
  
  <div>
  <!-- Default panel contents -->
      
    <table>
    <col width="20">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="728">
    <tr>
      <td>
        &nbsp; 
      </td>';
    if($_SESSION['teamRole']=='Scrum Master'){
        echo'
      <td>
          <form>
            <button onclick="openWin1()" class="backlogButton">Add New Userstory</button>
          </form> 
        </td>
        <td >&nbsp;</td>
    ';
      }
      else{
        echo '<td></td>';
      }
       echo '<td>
          <form>
            <button onclick="openWin2()" class="backlogButton">Add New Defect</button>
          </form>
        </td>
        <td >&nbsp;</td>
        <td>
          <form>
          <button onclick="openWinTask()" class="backlogButton">Add New Task</button>
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
          window.open("http://agilepartner.comxa.com/index.php/us_controller","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

        function openWin2()
        {
          window.open("http://agilepartner.comxa.com/index.php/addDefect","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

         function openWinTask()
        {
          window.open("http://agilepartner.comxa.com/index.php/newtask","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }

        
      </script>
        ';

     echo "
    <div style='height:400px; overflow:scroll; overflow-x:hidden;'>
     <div> 
  <!-- Table -->
      <center>
      <div class='datagrid' style='width:1320px'>
      <table id='iterationTable' >
          <thead><tr> 
          <th width='10%' align='center'> <img src='".base_url('assets\images\us_icon.png')."'></img>&nbsp; ID </th>
          <th width='35%' align='center'> Name </th>
          <th width='10%' align='center'> Plan-Estima </th>
          <th width='15%' align='center'> Priority </th>
          <th width='15%' align='center'> Owner </th>
          <th width='5%' align='center'> Details </th>";
  if($_SESSION['teamRole']=='Scrum Master'){
    echo "<th width='5%' align='center'> Edit </th>
          <th width='5%' align='center'> DELETE </th>";
  }
    echo "</tr></thead>
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
      <td><a href='http://agilepartner.comxa.com/index.php/viewUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
  if($_SESSION['teamRole']=='Scrum Master'){
    echo "<td width='5%' align='center'> <a href='http://agilepartner.comxa.com/index.php/editUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>
          <td width='5%' align='center'> <a href='http://agilepartner.comxa.com/index.php/deleteUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>";
  }

echo "</tr> 
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
      <td><a href='http://agilepartner.comxa.com/index.php/viewUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
    if($_SESSION['teamRole']=='Scrum Master'){
      echo "<td width='5%' align='center'> <a href='http://agilepartner.comxa.com/index.php/editUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>
            <td width='5%' align='center'> <a href='http://agilepartner.comxa.com/index.php/deleteUserstory/get_values/". $db_field['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>";
    }
echo "
    </tr> 
    </tbody>
  

  ";
 
}

echo '</table>
      </div>
      </center>
      
    </div>';

echo '</div></div>';
echo '<script>myfunction()</script>';

?>

</html>
