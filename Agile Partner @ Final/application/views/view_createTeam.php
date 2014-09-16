<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<html>
<head>    

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>Setup</title>

    <!-- Custom styles for this template -->

   <?php
      echo link_tag('assets/css/navbar.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/buttons.css');
      echo link_tag('assets/css/iterationTable.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>


    <script>
      function openCreateTeam()
      {
        window.open('http://agilepartner.comxa.com/index.php/createNewTeam','1393831394416','width=1000,height=620,toolbar=0,menubar=0,location=1,status=1,scrollbars=1,resizable=1,left=160,top=20');
      }

      function openEditTeam()
      {
        window.open('http://agilepartner.comxa.com/index.php/editTeam_selectTeam','1395886463505','width=970,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=180,top=40');
      }

      function openUserDetails()
      {
        window.open('http://agilepartner.comxa.com/index.php/userDetails/get_Interface','1395886463505','width=970,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=180,top=40');
      }
      function openWorkLoad()
      {
        window.open('http://agilepartner.comxa.com/index.php/teamload','1395886463505','width=970,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=180,top=40');
      }

      function load()
      {
        var selectedValue = team.options[team.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/createTeam/loadDetails/"+selectedValue;
        window.location.assign(url);
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
  echo ' 
    <div>
        <form class="form-defect" role="form">
          <td>
            &nbsp;&nbsp;&nbsp;
          </td>
         <td> 
          <button class="planButton" onclick="openCreateTeam()">Create Team</button>
          </td>
         <button class="planButton" onclick="openEditTeam()">Edit Team</button>
         <td>
          <button class="planButton" onclick="openUserDetails()">View User Details</button>
         </td>
         <td>
          <button class="planButton" onclick="openWorkLoad()">Calculate workload</button>
         </td>
      </form>
    </div> ';
  }
  ?>

  <BR>
  <font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Team :&nbsp;</font>
  <select id="team" name="team" style="width:160px">
    <?php
      loadTeams($selected_team);
    ?>
  </select>
  &nbsp;
  <button name="load" type="button" class="button" onclick="load()">Load</button>
  <br>
<div style="height:370px; overflow:scroll; overflow-x:hidden;">
  <br>
	<?php
    loadUsers($selected_team);
	?>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
  
</body>	

</html>

<?php

  function loadUsers($team){

    $query = "SELECT distinct u.fName,u.lName,u.title,u.phone,u.username,t.permission,t.role FROM users u, newteam t WHERE u.username=t.userName AND teamId='$team' ORDER BY u.fName ASC";
    $result = mysql_query($query);

    echo '<center><div class="datagrid" style="width:1320px">
          <table id="iterationTable">
            <thead>
            <tr>
              <th width="20%">FIRST NAME</th>
              <th width="20%">ROLE</th>
              <th width="20%">PERMISSION</th>';
      if($_SESSION['teamRole']=='Scrum Master'){
        echo '<th width="5%">CHANGE</th>';
      }
        echo '<th width="20%">EMAIL</th>
              <th width="15%">CONTACT NO.</th>   
            </tr>
            </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      echo "<tbody><tr class='alt'><td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td><td>" . $row['role'] . "</td>
            <td>" . $row['permission'] . "</td>";
      if($_SESSION['teamRole']=='Scrum Master'){
        if($_SESSION['email']!=$row['username']){
          echo "<td><a href='http://agilepartner.comxa.com/index.php/userPermission/get_values/". $row['username'] ."'> 
            <img src='".base_url('assets\images\permission_icon.png')."'></img> </a></td>";
        }
        else{
          echo "<td></td>";
        }
      }
      echo "<td>" . $row['username'] . "</td>
            <td>" . $row['phone'] . "</td></tr></tbody>";
    }

    echo "</table>
          <div></center>";
  }

  function loadTeams($team)
  { 
    if($team){
      echo '<option value="'.$team.'" selected>' . $team .'</option>'; //set selected
    }

    $result = mysql_query("select DISTINCT teamId from newteam where teamId!='$team'");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['teamId'] .'" >' . $row['teamId'] .'</option>';
    }
      
  }

?>