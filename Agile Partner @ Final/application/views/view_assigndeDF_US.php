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

    <title>Iteration Details</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/iterationTable.css');
    ?>

  </head>

  <body>

  <div>
    <table align = "left" border="0" style="width:auto">
      <col width="500">
      <col width="500">
      <tr> 
        <td>
          <?php
            loadIterationDetails($iteration);
          ?>
        </td>
      </tr>
      <tr>
        <td>
          &nbsp;
        </td>
      </tr>
      <tr>
        <td>
          <?php
            loadTeamDetails($iteration,$_SESSION['project']);
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>


  </body>

</html>


<?php

  function loadIterationDetails($iteration){

    $query = "SELECT s.ID,s.Name,s.Plan_estima,s.sch_state,s.Discription FROM assign_userstory_to_iteration ai,userstory s WHERE s.ID=ai.userstory AND ai.iteration='$iteration'
              UNION SELECT d.id,d.name,d.planEstimate,d.scheduleState,d.description FROM defect d WHERE d.iteration='$iteration'";
    $result = mysql_query($query);

    if(mysql_num_rows($result)>0){
    
      echo '&nbsp;&nbsp; <b>Userstories and Defects assigned for iteration : </b> <b style="color: blue; font-size:16px">'.$iteration.'</b>';
      echo '<center><br><div class="datagrid" style="width:1320px">
            <table id="iterationTable">
              <thead>
              <tr>
                <th width="5%"></th>
                <th width="10%">ID</th>
                <th width="25%">NAME</th>
                <th width="40%">DESCRIPTION</th>
                <th width="5%">Est</th>
                <th width="15%">SCHEDULE STATE</th>';
        if($_SESSION['teamRole']=='Scrum Master'){
          //echo '<th width="5%">REMOVE</th>';
        }
          echo '</tr>
              </thead>';

      while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
        echo "<tbody><tr class='alt'>";
        $num = explode("-", $row['ID']);
        
        if($num[0]=="US"){
          echo "<td><img src='".base_url('assets\images\us_icon.png')."' ></img></td>";
        }
        else if ($num[0]=="DF") {
          echo "<td><img src='".base_url('assets\images\defect_icon.png')."' > </img></td>";
        }

        echo "<td>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Discription'] . "</td><td>" . $row['Plan_estima'] . "</td>
              <td>" . $row['sch_state'] . "</td>";
      if($_SESSION['teamRole']=='Scrum Master'){
        /*echo "<td><a href='http://localhost/Rally_CI/assignedDF_US/remove/". $row['ID'] ."'>
               <img src='".base_url('assets\images\delete_icon.png')."' > </img> </a></td>"; */
      }
        echo "</tr></tbody>";
      }

      echo "</table>
            <div></center>";
    }
    else{
      echo "<script>alert('Nothing assigned for this iteration!')</script>";
      redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh');
    }

  }

  function loadTeamDetails($iteration,$project){

    $query = "SELECT DISTINCT u.fName,u.lName,t.role,u.phone,u.username FROM users u,defect d,userstory s,newteam t WHERE (u.username=d.owner OR u.username=d.submittedBy OR u.username=s.Owner) AND (d.iteration='$iteration' AND s.iteration='$iteration') AND u.username=t.userName AND t.projectName='$project'";
    $result = mysql_query($query);

    if(mysql_num_rows($result)>0){
    
      echo '&nbsp;&nbsp; <b>Team members working on iteration : </b> <b style="color: blue; font-size:16px">'.$iteration.'</b>';
      echo '<center><br><div class="datagrid" style="width:1320px">
            <table id="iterationTable">
              <thead>
              <tr>
                <th width="20%">NAME</th>
                <th width="20%">ROLE</th>
                <th width="20%">PHONE</th>
                <th width="20%">EMAIL</th>';
          echo '</tr>
              </thead>';

      while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
        echo "<tbody><tr class='alt'>";

        echo "<td>" . $row['fName'] .'&nbsp;'. $row['lName'] . "</td><td>" . $row['role'] . "</td><td>" . $row['phone'] . "</td><td>" . $row['username'] . "</td>";

        echo "</tr></tbody>";
      }

      echo "</table>
            <div></center>";
    }
    else{
      echo "<script>alert('Nothing assigned for this iteration!')</script>";
      redirect('http://agilepartner.comxa.com/index.php/plan', 'refresh');
    }

  }

?>
