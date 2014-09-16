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
      echo link_tag('assets/css/buttons.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script>
        function openWin()
        {
          window.open("http://agilepartner.comxa.com/index.php/createIteration","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=100, left=175, width=1000, height=480");
        }
    </script>

    <script>
        function openWinUS()
        {
          window.open("http://agilepartner.comxa.com/index.php/usAssignedToIteration_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=150, left=175, width=1000, height=350");
        }
    </script>
    <script>
        function openWinDF()
        {
          window.open("http://agilepartner.comxa.com/index.php/assignedToIteration_SelectProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=150, left=175, width=1000, height=350");
        }
    </script>
    <script>
        function openWinRel()
        {
          window.open("http://agilepartner.comxa.com/index.php/createRelease","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=90, left=175, width=1000, height=550");
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
    <label id="eventPosition" style="margin-left: 1350px;"></label>

    <?php 
      echo '<label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>';
    ?>

  <div>
    <table align = "left" border="0" style="width:auto; margin-left:10px;">
      <col width="500">
      <col width="500">
      <tr> 
        <td>
          <?php if($_SESSION['teamRole']=='Scrum Master'){ 
          echo'
          <form>
            <table>
              <tr>
                <td>
                  &nbsp;
                </td>
                <td>
                  &nbsp;<button class="planButton" onclick="openWin()">Create Iteration</button>
                </td>
                <td>
                  &nbsp;<button class="planButton" onclick="openWinUS()">Assign Userstory to Iteration</button>
                </td>
                <td>
                  &nbsp;<button class="planButton" onclick="openWinRel()">Create Release</button>
                </td>
              </tr>
            </table>
          </form>
          ';}?>
        <div style="height:415px; overflow:scroll; overflow-x:hidden;">
          <br>
          <?php
            loadIterations();
            echo '<br><br>';
            loadReleases();
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
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>


  </body>

</html>


<?php

  function loadIterations(){
    $project=$_SESSION['project'];
    $query = "SELECT * FROM iteration WHERE project='$project' ORDER BY name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">ITERATION NAME</th>
              <th width="15%">START DATE</th>
              <th width="15%">END DATE</th>
              <th width="10%">DAYS</th>
              <th width="15%">PLANNED VELOCITY</th>';
      if($_SESSION['teamRole']=='Scrum Master'){ 
        echo '<th width="5%">EDIT</th>
              <th width="5%">DELETE</th>';
      }
        echo '<th width="5%">DETAILS</th>
            </tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td>
            <td>" . $row['days'] . "</td><td>" . $row['PlannedVelocity'] . "</td>";
      if($_SESSION['teamRole']=='Scrum Master'){
      echo "<td><a href='http://agilepartner.comxa.com/index.php/editIteration/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/deleteIteration/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>";
      }
      echo "<td><a href='http://agilepartner.comxa.com/index.php/assignedDF_US/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\view_icon.png')."' > </img> </a></td></tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";

  }

  function loadReleases(){
    $project=$_SESSION['project'];
    //load releases
    $query_r = "SELECT * FROM `release` WHERE `project`='$project'";
    $result_r = mysql_query($query_r);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="35%">RELEASE NAME</th>
              <th width="15%">START DATE</th>
              <th width="15%">RELEASE DATE</th>
              <th width="15%">PLANNED VELOCITY</th>
              <th width="15%">STATE</th>
              <th width="15%">VERSION</th>';
      if($_SESSION['teamRole']=='Scrum Master'){
        echo '<th width="5%">EDIT</th>
              <th width="5%">DELETE</th>';
      }
        echo '
            </tr>
            </thead>';

    while($row_r = mysql_fetch_array($result_r)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row_r['name'] . "</td><td>" . $row_r['startDate'] . "</td><td>" . $row_r['releaseDate'] . "</td><td>" . $row_r['plannedVelocity'] . 
            "</td><td>" . $row_r['state'] . "</td><td>" . $row_r['version'] . "</td>";
      if($_SESSION['teamRole']=='Scrum Master'){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/editRelease/get_values/". $row_r['name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/deleteRelease/get_values/". $row_r['name'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>";
      }    
        echo "</tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>
