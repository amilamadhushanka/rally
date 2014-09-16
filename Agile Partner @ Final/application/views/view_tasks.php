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
        window.open("http://agilepartner.comxa.com/index.php/viewUnAssignTask","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
      }

      function openWin1()
      {
        window.open("http://agilepartner.comxa.com/index.php/viewTask_selectUser","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
      }

      function openWinTask()
      {
        window.open("http://agilepartner.comxa.com/index.php/newtask","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=220, width=1000, height=640");
      }
    </script>

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
    <label id="eventPosition" style="margin-left: 1350px;"></label>

    <?php 
      echo '<label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>';
    ?>

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
            <button onclick="openWin1()" class="taskButton">View Assign Tasks</button>
          </form> 
        </td>
        <td >&nbsp;</td>
        <?php 
          if($_SESSION['teamRole']=='Scrum Master'){
           echo '<td>
              <form>
                <button onclick="openWin()" class="taskButton">Assign Tasks</button>
              </form>
            </td>
            <td>&nbsp;</td>';
          }
        ?>
          <td>
          <form>
          <button onclick="openWinTask()" class="taskButton">Add New Task</button>
          </form>
        </td>
    </tr>
  </table>
<div style="height:430px; overflow:scroll; overflow-x:hidden;">
  <br>
    <?php
      loadTasks($_SESSION['project']);
    ?>
  <div>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadTasks($project){

    $query = "SELECT t.task_name,t.description,t.estimated_time,s.Name,u.fName,u.lName FROM newtask t,userstory s,users u WHERE t.user_story=s.Name AND t.owner=u.username AND t.project_name='$project' ORDER BY s.Name ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="30%">USER STORY</th>
              <th width="10%">TASK ID</th>
              <th width="20%">TASK</th>
              <th width="10%">ESTIMATED TIME</th>
              <th width="20%">OWNER</th>';
      if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
        echo '<th width="5%">EDIT</th>';
      }
      if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){
        echo '<th width="5%">DELETE</th>';
      }
      echo '</tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['Name'] . "</td><td>" . $row['task_name'] . "</td>
              <td>" . $row['description'] . "</td><td>" . $row['estimated_time'] . "</td>
             <td>" . $row['fName'] .'&nbsp;'. $row['lName'] . "</td>";
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
      echo "<td><a href='http://agilepartner.comxa.com/index.php/editTask/get_values/". $row['task_name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td>";
    }
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){
       echo "<td><a href='http://agilepartner.comxa.com/index.php/deleteTask/get_values/". $row['task_name'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>";
    }
       echo "</tr></tbody>";  //$row['index'] the index here is a field name
    }

    $query1 = "SELECT t.task_name,t.description,t.estimated_time,s.Name FROM newtask t,userstory s WHERE t.user_story=s.Name AND t.owner='' AND t.project_name='$project' ORDER BY s.Name ASC";
    $result1 = mysql_query($query1);

    while($row = mysql_fetch_array($result1)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['Name'] . "</td><td>" . $row['task_name'] . "</td>
              <td>" . $row['description'] . "</td><td>" . $row['estimated_time'] . "</td>
             <td>".'&nbsp;'."</td>";
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){
      echo "<td><a href='http://agilepartner.comxa.com/index.php/editTask/get_values/". $row['task_name'] ."'>
             <img src='".base_url('assets\images\edit_icon.png')."' > </img> </a></td>";
    }
    if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){
       echo "<td><a href='http://agilepartner.comxa.com/index.php/deleteTask/get_values/". $row['task_name'] ."'>
             <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>";
    }
       echo "</tr></tbody>";  //$row['index'] the index here is a field name
    }

    echo "</table>
          <div></center>";
  }

?>