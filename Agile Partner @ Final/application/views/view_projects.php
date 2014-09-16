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

    <title>PROJECTS</title>

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
        window.open("http://agilepartner.comxa.com/index.php/newProject","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=30, left=190, width=950, height=570");
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

<?php
  if($_SESSION['teamRole']=='Scrum Master'){
    echo'
  <table>
    <col width="20">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="2">
    <col width="817">
    <tr>
      <td>
        &nbsp;
      </td>
      <td>
          <form>
            <button onclick="openWin()" class="projectButton">Add New Project</button>
          </form> 
      </td>
    </tr>
  </table>';
  }
?>

<div style="height:420px; overflow:scroll; overflow-x:hidden;">
  <div>
    <br>
      <?php
        loadAssignedDefects();
      ?>
  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadAssignedDefects(){

    $user=$_SESSION['email'];
    $query = "SELECT DISTINCT p.name,p.discription,p.state,p.owner FROM project p,newteam t WHERE p.name=t.projectName AND t.userName='$user' ORDER BY p.name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="defectsTable" class="table_US" >
             <thead><tr>
              <th width="30%">PROJECT NAME</th>
              <th width="40%">DESCRIPTION</th>
              <th width="10%">STATE</th>
              <th width="20%">OWNER</th>';
      if($_SESSION['teamRole']=='Scrum Master'){
        echo '<th width="20%">Edit</th>';
      }

      echo '</tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['discription'] . "</td><td>" . $row['state'] . "</td>
            <td>" . $row['owner'] . "</td>";
      if($_SESSION['teamRole']=='Scrum Master'){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/editProject/get_values/". $row['name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a>  </td>";
      }
        echo "</tr> 
              </tbody>";  
    }

    echo "</table>
          </div>
          </center>";

  }

?>
