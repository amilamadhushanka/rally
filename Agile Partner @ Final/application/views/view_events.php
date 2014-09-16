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

    <title>Events</title>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
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
        window.open("http://agilepartner.comxa.com/index.php/createEvent","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
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
  <table>
    <tr>
      <td>
        &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus" style="color:blue"></span>&nbsp; 
      </td>
      <td>
        <form>
          <button onclick="openWin()" class="backlogButton">Create Events</button>
        </form> 
      </td>
    </tr>
  </table>

<div style="height:470px; overflow:scroll; overflow-x:hidden;">

  <div>
    <br>
      <?php
        loadEvents();
      ?>
  </div>

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadEvents(){

    $project=$_SESSION['project'];
    $createdBy=$_SESSION['email'];


    $query = "SELECT DISTINCT e.id,e.name,e.date,e.time 
              FROM events e WHERE e.createdBy='$createdBy' AND e.project='$project' GROUP BY e.id Order BY e.date ASC";
    $result = mysql_query($query);

    echo "<center><div class='datagrid' style='width:1320px'>
          <table id='defectsTable' class='table_US' >
             <thead><tr>
              <th width='10%'>ID</th>
              <th width='35%'>EVENT</th>
              <th width='20%'>DATE</th>
              <th width='20%'>TIME</th>
              <th width='5%'>EDIT</th>
              <th width='5%'>DELETE</th>";
        echo "</tr> </thead>";

    while($row = mysql_fetch_array($result)){
      
      echo "<tbody><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td><td><a href='http://agilepartner.comxa.com/index.php/editEvent/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > 
            </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/deleteEvent/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > 
            </img> </a></td>";
    }
      echo "</tr></tbody>";

    echo "</table>
          </div>
          </center>";

  }

?>
