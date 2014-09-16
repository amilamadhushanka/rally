
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

  <title>Iterations</title>

  <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      //echo link_tag('assets/css/reportsTable.css');
      echo link_tag('assets/css/buttons.css');
    ?>

  <script>
    function printPage() {
      window.print();
    }
</script>


    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    <script type="text/javascript" src="http://www.workshop.rs/jqbargraph/jquery.js"></script>
    <script type="text/javascript" src="http://www.workshop.rs/jqbargraph/jqBarGraph.js"></script>

    <title>Iteration Velocity</title>
    
    <script type="text/javascript" src=<?php echo base_url('assets/js/jqBarGraph.min.js'); ?>></script>
    <script type="text/javascript">
      $(document).ready(function () {
        var arrayOfPHPData = <?php echo json_encode($reportRelease) ?>;
        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {
          arrayOfDataJS[i] = [parseInt(elem['plannedVelocity']),elem['name']];
        });
        console.log(arrayOfDataJS);
        $('#divForGraph').jqBarGraph({
          data: arrayOfDataJS,
          //title: "Iteration Planned Velocity",
          barSpace: 50,
          //postfix: ' PV',
          height: 200,
          color: '#01DFD7',
          showValues: true,
        });
      });
    </script>
  </head>
   
  <body>

    <div style="height:540px; overflow:scroll; overflow-x:hidden;">
  &nbsp;
  <center>
  <table>
    <col width="100">
    <col width="1050">
    <col width="100">
    <tr>
      <td>
        <?php
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url('assets\images\logo.png')."'></img>";
        ?>
      </td>
      <td>&nbsp;&nbsp;<font size="6"><b>Release Report</b></font></td>
      <td>
        <?php echo "<img src='".base_url('assets\images\print_button.png')."' onclick='printPage()' id='printLink'></img>"?>
        <!-- <button id="printButton" name="printButton" onclick="printPage()" >Print</button> -->
      </td>
    </tr>
  </table>
  
  <hr>
  
  <table border-collapse: collapse;>
    <col width="1200" align="left">
    <col width="300">
    <tr>
      <td>
        <table style="cellspacing='10'">
          <tr>
            <td style="padding-bottom: .5em;"><b>Project &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                &nbsp;<?php echo $project; ?></b>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  
  <hr>

      <?php
          loadRelease();
          //pdf();
      ?>
  <br><br>
  <center>
    <div id="wrapper">
      <?php
        
          echo '<div id="divForGraph"></div>';
        
       
      ?>
    </div>
  </center>
  <br>
  <br>

  <center>
  <div style="position: relative">
    <p style="position: relative; bottom: 0; width:100%; text-align: center">
         <?php date_default_timezone_set('Asia/Colombo'); "&nbsp;"."(".date('m/d/Y H:i').")"; ?></p>
  </div>
  </center>
  </div>


     <?php
  
  function loadRelease(){

    $query = "SELECT DISTINCT r.`name`,r.`startDate`,r.`releaseDate`,r.`plannedVelocity`,r.`version` FROM `release` r WHERE `state`='Planning' ORDER BY r.`name` ASC";
    $result = mysql_query($query);

    echo "<center><div style='width:100%'>
          State : Planned
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>     
              <th width='15%'>RELEASE DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>VERSION</th>
            </tr> </thead> ";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['releaseDate'] . "</td>
            <td>" . $row['plannedVelocity'] . "</td><td>" . $row['version'] .  "</td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";


    $query = "SELECT DISTINCT r.`name`,r.`startDate`,r.`releaseDate`,r.`plannedVelocity`,r.`version` FROM `release` r WHERE `state`='Active' ORDER BY r.`name` ASC";
    $result = mysql_query($query);

    echo "<center><div style='width:100%'>
          State : Active
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>     
              <th width='15%'>RELEASE DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>VERSION</th>
            </tr> </thead> ";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['releaseDate'] . "</td>
            <td>" . $row['plannedVelocity'] . "</td><td>" . $row['version'] .  "</td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";


    $query = "SELECT DISTINCT r.`name`,r.`startDate`,r.`releaseDate`,r.`plannedVelocity`,r.`version` FROM `release` r WHERE r.`state`='Accepted' ORDER BY r.`name` ASC";
    $result = mysql_query($query);

    echo "<center><div style='width:100%'>
          State : Accepted
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>     
              <th width='15%'>RELEASE DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>VERSION</th>
            </tr> </thead> ";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['releaseDate'] . "</td>
            <td>" . $row['plannedVelocity'] . "</td><td>" . $row['version'] .  "</td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";

  }

?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>  
  
</body>
</html>

