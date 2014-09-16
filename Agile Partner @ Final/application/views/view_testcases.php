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

    <title>Test Cases</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/User_Story.css');
      echo link_tag('assets/css/bootstrap.min.css');
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
    <label id="eventPosition" style="margin-left: 1350px;"></label>

    <?php 
      echo '<label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>';
    ?>

<div class="input-group">
          
</div>


   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
    
  </body>

  <?php

$SQL = "SELECT * FROM testcase t, users u WHERE t.TC_Owner=u.username";
$result = mysql_query($SQL);


echo '<div >
  <!-- Default panel contents -->

      <table>
      <tr> 
        <td>
          <form>
            &nbsp;&nbsp;&nbsp; 
            <button onclick="openWin1()" class="qualityButton">Add New Testcase</button>
          </form> 
        </td>
        <td>
          <form>
            &nbsp; 
            <button onclick="openWin2()" class="qualityButton">Assign Testcase</button>
          </form> 
        </td>
        
      </tr>
      <tr>
        <td >&nbsp;</td>
      </tr>
  
      </table>

      <script>
        function openWin1()
        {
          window.open("http://agilepartner.comxa.com/index.php/addTestcase","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }
        function openWin2()
        {
          window.open("http://agilepartner.comxa.com/index.php/assignTestcaseToMember","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
        }
      </script>
        
  <div style="height:410px; overflow:scroll; overflow-x:hidden;">

     <form class="navbar-form navbar-left">
     <div class="form-group">  
  <!-- Table -->
      <center>
      <div class="datagrid" style="width:1300px">
      <table id="iterationTable">
          <thead><tr> 
          <th  align="center"> Iteration Name</th>
          <th  align="center"> Testcase ID </th>
          <th  align="center"> Testcase Name </th>
          <th  align="center"> User Story ID </th>
          <th  align="center"> Testcase Priority </th>
          <th  align="center"> Testcase Owner </th>
          <th  align="center"> Method </th>
          <th  align="center"> Status </th>
          <th align="center"> Last Run </th>
          <th align="center">DETAILS</th>';
  if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
    echo '<th align="center"> Edit </th>';
  }
  if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){
    echo '<th align="center"> Delete </th>';
  }
    echo '</tr></thead>
      ';



while ($db_field = mysql_fetch_assoc($result))
{

  echo "
     <tbody><tr class='alt'>
      <td align='center'>".$db_field['IterationName']."</td>
      <td align='center'>".$db_field['TC_id']."</td>
      <td align='center'>".$db_field['TC_Name']."</td>
      <td align='center'>".$db_field['USid']."</td>
      <td align='center'>".$db_field['TC_Priority']."</td>
      <td align='center'>".$db_field['fName'].'&nbsp;' . $db_field['lName'] ."</td>
      <td align='center'>".$db_field['Method']."</td>
      <td align='center'>".$db_field['testcaseStatus']."</td>
      <td align='center'>".$db_field['LastRun']."</td>
      <td align='center'><a href='http://agilepartner.comxa.com/index.php/viewTestcase/get_values/". $db_field['IterationName'] . "/". $db_field['USid'] . "/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > </img> </a> </td>";
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
      echo "<td align='center'><a href='http://agilepartner.comxa.com/index.php/editTestcase/get_values/". $db_field['IterationName'] . "/". $db_field['USid'] . "/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>";
    }
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){  
      echo "<td align='center'><a href='http://agilepartner.comxa.com/index.php/deleteTestcase/get_values/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>";
    }  
echo "</tr> </tbody>";
  
}

$SQL = "SELECT * FROM testcase WHERE TC_Owner='noEntry'";
$result = mysql_query($SQL);

while ($db_field = mysql_fetch_assoc($result))
{

  echo "
     <tbody><tr class='alt'>
      <td align='center'>".$db_field['IterationName']."</td>
      <td align='center'>".$db_field['TC_id']."</td>
      <td align='center'>".$db_field['TC_Name']."</td>
      <td align='center'>".$db_field['USid']."</td>
      <td align='center'>".$db_field['TC_Priority']."</td>
      <td align='center'>".'&nbsp;'."</td>
      <td align='center'>".$db_field['Method']."</td>
      <td align='center'>".$db_field['testcaseStatus']."</td>
      <td align='center'>".$db_field['LastRun']."</td>
      <td align='center'><a href='http://agilepartner.comxa.com/index.php/viewTestcase/get_values/". $db_field['IterationName'] . "/". $db_field['USid'] . "/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > </img> </a> </td>";
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
      echo "<td align='center'><a href='http://agilepartner.comxa.com/index.php/editTestcase/get_values/". $db_field['IterationName'] . "/". $db_field['USid'] . "/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a> </td>";
    }
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){  
      echo "<td align='center'><a href='http://agilepartner.comxa.com/index.php/deleteTestcase/get_values/". $db_field['TC_id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a> </td>";
    }  
echo "</tr> </tbody>";
  
}

echo '</table>
      </div>
      </center>
      </form>
      </div>
    </div></div>';

?>

</html>
