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
        window.open("http://agilepartner.comxa.com/index.php/addDefect","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
      }

      function openWin1()
      {
        window.open("http://agilepartner.comxa.com/index.php/us_controller","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=10, left=175, width=1000, height=640");
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
    <col width="728">
    <tr>
      <td>
        &nbsp; 
      </td>
    <?php
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
      ?>
        <td>
          <form>
            <button onclick="openWin()" class="backlogButton">Add New Defect</button>
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
            <option value="us">User Stories</option>
            <option value="df">Defects</option>
            <option value="all" selected>All</option>
        </td>
      </td>
    </tr>
  </table>

<div style="height:430px; overflow:scroll; overflow-x:hidden;">
  <br>
  <div>
    <?php
      loadAll();
    ?>

  </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

<?php

  function loadAll(){

    $project=$_SESSION['project'];

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.priority,d.owner,d.state,u.fName,u.lName 
              FROM defect d,users u WHERE d.owner=u.username AND project='$project' ORDER BY d.priority ASC";
    $result = mysql_query($query);

    $query_US = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,s.state,u.fName,u.lName 
                 FROM userstory s,users u WHERE s.Owner=u.username AND pname='$project' ORDER BY s.Priority ASC";
    $result_US = mysql_query($query_US);

    echo '<center>
          <div class="datagrid" style="width:1320px">
          <table id="defectsTable">
            <thead>
            <tr>
              <th width="5%"></th>
              <th width="10%">ID</th>
              <th width="35%">NAME</th>
              <th width="10%">STATE</th>
              <th width="10%">PRIORITY</th>
              <th width="15%">OWNER</th>
              <th width="5%">DETAILS</th>';
        echo '<th width="5%">EDIT</th>';
        echo '<th width="5%">DELETE</th>';
        echo '</tr>
            </thead>';

    while($row1 = mysql_fetch_array($result_US)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td><img src='".base_url('assets\images\us_icon.png')."' > 
            </img></td><td>". $row1['ID'] . "</td><td>" . $row1['Name'] . "</td><td>" . $row1['state'] . "</td>
            <td>" . $row1['Priority'] . "</td><td>" . $row1['fName'] . '&nbsp;' . $row1['lName'] . "</td>
            <td><a href='http://agilepartner.comxa.com/index.php/viewUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
    
      if($_SESSION['teamRole']=='Scrum Master'){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/editUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > 
            </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/deleteUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > 
            </img> </a></td>";
      }
      else{
        echo "<td></td><td></td>";
      }
      echo "</tr></tbody>";
    }

    $query_US = "SELECT DISTINCT s.ID,s.Name,s.Plan_estima,s.Priority,s.Owner,s.state FROM userstory s,users u 
                  WHERE s.Owner='noEntry' AND pname='$project' ORDER BY s.Priority ASC";
    $result_US = mysql_query($query_US);

    while($row1 = mysql_fetch_array($result_US)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td><img src='".base_url('assets\images\us_icon.png')."' > 
            </img></td><td>". $row1['ID'] . "</td><td>" . $row1['Name'] . "</td><td>" . $row1['state'] . "</td>
            <td>" . $row1['Priority'] . "</td><td>".'&nbsp;'."</td>
            <td><a href='http://agilepartner.comxa.com/index.php/viewUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
      if($_SESSION['teamRole']=='Scrum Master'){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/editUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > 
            </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/deleteUserstory/get_values/". $row1['ID'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > 
            </img> </a></td>";
      }
      else{
        echo "<td></td><td></td>";
      }
      echo "</tr></tbody>";
    }


    //View Defects
    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td><img src='".base_url('assets\images\defect_icon.png')."' > 
            </img></td><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['state'] . "</td>
            <td>" . $row['priority'] . "</td><td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td>
            <td><a href='http://agilepartner.comxa.com/index.php/viewDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
      /*if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete'){        
        echo "<td><a href='http://localhost/Rally_CI/editDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > 
            </img> </a></td>";
      }
      else{ */
        echo '<td></td>';
      /*}
      if($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete'){
        echo "<td><a href='http://localhost/Rally_CI/deleteDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > 
            </img> </a></td>";
      }
      else{ */
        echo '<td></td>';
      //}
      echo "</tr></tbody>";
    }

    $query = "SELECT DISTINCT d.id,d.name,d.planEstimate,d.priority,d.owner,d.state,d.submittedBy FROM defect d,users u 
              WHERE d.owner='noEntry' AND project='$project' ORDER BY d.priority ASC";
    $result = mysql_query($query);

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

      echo "<tbody><tr class='alt'><td><img src='".base_url('assets\images\defect_icon.png')."' > 
            </img></td><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['state'] . "</td>
            <td>" . $row['priority'] . "</td><td>".'&nbsp;'."</td>
            <td><a href='http://agilepartner.comxa.com/index.php/viewDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\view_icon.png')."' > 
            </img> </a></td>";
      if(($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='edit'||$_SESSION['permission']=='edit/delete')&&$row['submittedBy']==$_SESSION['email']){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/editDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\edit_icon.png')."' > 
            </img> </a></td>";
      }
      else{
        echo '<td></td>';
      }
      if(($_SESSION['teamRole']=='Scrum Master'||$_SESSION['permission']=='delete'||$_SESSION['permission']=='edit/delete')&&$row['submittedBy']==$_SESSION['email']){
        echo "<td><a href='http://agilepartner.comxa.com/index.php/deleteDefect/get_values/". $row['id'] ."'> <img src='".base_url('assets\images\delete_icon.png')."' > 
              </img></a></td>";
      }
      else{
        echo '<td></td>';
      }
      echo "</tr></tbody>";
    }

    echo "</table></div>
          </center>";

  }

?>
