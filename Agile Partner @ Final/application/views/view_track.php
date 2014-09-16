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
      echo link_tag('assets/css/trackTable.css');
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
        var selectedProject = project.value;
        var selectedValue = iteration.options[iteration.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/track/loadDetails/"+selectedValue+"/"+selectedProject;
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

<form >

<input type="hidden" id="project" name="project" value="<?php echo $_SESSION['project']; ?>" style="width:160px; border: none; box-shadow: none" readonly>

&nbsp;

<font>&nbsp;&nbsp;&nbsp;Iteration :&nbsp;</font>
<select id="iteration" name="iteration" style="width:160px">
  <?php
    
    if($iteration){
      echo '<option value="'.$iteration.'" selected>' . $iteration .'</option>'; //set selected
    }

    foreach ($iterations as $row):
      echo '<option value="' . $row['name'] .'" >' . $row['name'] .'</option>';
    endforeach;

  ?>
</select>
&nbsp;
<button name="load" type="button" class="button" onclick="openWin()">Load</button>

<br><br>
  <?php

      echo '&nbsp;&nbsp; Iteration End :&nbsp;';
      
      //load IterationEnd
      foreach ($IterationEnd as $row):
        $endDate=$row['endDate'];
        $startDate=$row['startDate'];
      endforeach;
    
      $today=date('m/d/Y');
      $start = strtotime($today);
      $end = strtotime($endDate);

      $days_left = ceil(($end - $start) / 86400);
    
      $start = strtotime($startDate);
      $end = strtotime($endDate);
      $iteration_days = ceil(($end - $start) / 86400);

      if($days_left<0){
        echo '<label style="color: Red"><b> 0 days left of &nbsp;'.$iteration_days.'</b></label>';
      }
      else{
        echo '<b>'.$days_left.'&nbsp; days left of &nbsp;'.$iteration_days.'</b>';
      }

      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      foreach ($activeUserstories as $row):
        echo 'Active Userstories : &nbsp;<b>'.$row['cnt'].'</b>';
      endforeach;
      echo "&nbsp;<img src='".base_url('assets\images\us_icon.png')."' > </img>";
      
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
      
      foreach ($activeDefects as $row):
        echo 'Active Defects : &nbsp;<b>'.$row['cnt'].'</b>';
      endforeach;
      echo "&nbsp;<img src='".base_url('assets\images\defect_icon.png')."' > </img>";
    
  ?>
  <br><br>
  <center>
  <div class="datagrid" style="width:1350px;">
    <table id="defectsTable" >
      <thead><tr>
        <th width="338px">Defined</th>
        <th width="337px">In-Progress</th>
        <th width="342px">Completed</th>
        <th width="331px">Accepted</th>
        <th width="1px">&nbsp;</th>
      </tr>
      </thead>
    </table>
  </center>
  <center>
    <div class="datagrid" style="width:1350px; height:355px; overflow:scroll; overflow-x:hidden; border:thin solid; border-color:DarkGray;">
    <table id="defectsTable">
      <tr>
        <td valign="top" width="25%">
          <?php
            
            //load Defined UserStories
            foreach ($defined_us as $row):
      
              echo '<center><div class="datagrid1" style="width:100%">
                    <table id="defectsTable">';

              $lastName=$row['lName'][0].'.';
            
              $creationDate=$row['creationDate'];
              $today=date('m/d/Y');
            
              $start = strtotime($creationDate);
              $end = strtotime($today);

              $days_passed = ceil(abs($end - $start) / 86400).' days';

              echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\us_icon.png')."' > </img><br>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $days_passed . "</td>
                    <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToInProgress/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
                    </img> </a></td></tr></tbody>";

              echo "</table>
                    </div>
                    </center>";

              echo '<br>';
            endforeach;

            //load Defined Defects
            foreach ($defined_df as $row):
            echo '<center><div class="datagrid1" style="width:100%">
                  <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';
            
            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\defect_icon.png')."' > </img><br>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToInProgress/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
            endforeach;
          ?>

        </td>
        <td valign="top" width="25%">
          <?php
            
          //load In-Progress UserStories
          foreach ($inProgress_us as $row):
            echo '<center><div class="datagrid1" style="width:100%">
            <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';
            
            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\us_icon.png')."' > </img><br>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToDefined/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
                  </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToCompleted/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;

          //load In-Progress Defects
          foreach ($inProgress_df as $row):
            echo '<center><div class="datagrid1" style="width:100%">
            <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\defect_icon.png')."' > </img><br>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
              <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToDefined/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
              </img> </a></td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToCompleted/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
              </img> </a></td></tr></tbody>";

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;
          ?>
        </td>
        <td valign="top" width="25%">
          <?php

          //load Completed UserStories
          foreach ($completed_us as $row):
            echo '<center><div class="datagrid1" style="width:100%">
            <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';
            
            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\us_icon.png')."' > </img><br>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToInProgress/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
                  </img> </a></td>";

            if($_SESSION['teamRole']=='Scrum Master'){
              echo "<td><a href='http://agilepartner.comxa.com/index.php/track/moveToAccepted/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";
            }

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;

          //load Completed Defects
          foreach ($completed_df as $row):
            echo '<center><div class="datagrid1" style="width:100%">
                  <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\defect_icon.png')."' > </img><br>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td><td><a href='http://agilepartner.comxa.com/index.php/track/moveToInProgress/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
                  </img> </a></td>";

            if($_SESSION['teamRole']=='Scrum Master'){
              echo "<td><a href='http://agilepartner.comxa.com/index.php/track/moveToAccepted/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\assign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";
            }

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;
          ?>
        </td>
        <td valign="top" width="25%">
          <?php

          //load Accepted UserStories
          foreach ($accepted_us as $row):
            echo '<center><div class="datagrid1" style="width:100%">
                  <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';
            
            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\us_icon.png')."' > </img><br>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td>";

            if($_SESSION['teamRole']=='Scrum Master'){
              echo "<td><a href='http://agilepartner.comxa.com/index.php/track/moveToCompleted/". $row['ID'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";
            }

            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;

          //load Accepted Defects
          foreach ($accepted_df as $row):
            echo '<center><div class="datagrid1" style="width:100%">
                  <table id="defectsTable" >';

            $lastName=$row['lName'][0].'.';

            $creationDate=$row['creationDate'];
            $today=date('m/d/Y');
            
            $start = strtotime($creationDate);
            $end = strtotime($today);

            $days_passed = ceil(abs($end - $start) / 86400).' days';

            echo "<tbody><tr class='alt'><td height='80'><img src='".base_url('assets\images\defect_icon.png')."' > </img><br>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $days_passed . "</td>
                  <td>" . $row['fName'] . '&nbsp;' . $lastName . "</td>";

            if($_SESSION['teamRole']=='Scrum Master'){
              echo "<td><a href='http://agilepartner.comxa.com/index.php/track/moveToCompleted/". $row['id'] ."/". $iteration ."/".$project."'> <img src='".base_url('assets\images\unassign_icon_p.png')."' > 
                  </img> </a></td></tr></tbody>";
            }
            
            echo "</table>
                  </div>
                  </center>";

            echo '<br>';
          endforeach;
          ?>
        </td>
      </tr>
    </table>
      </div>
  </div>
  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

  </body>

</html>

