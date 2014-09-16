
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
        var arrayOfPHPData = <?php echo json_encode($iterationVelocityChart) ?>;
        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {
          arrayOfDataJS[i] = [parseInt(elem['PlannedVelocity']),elem['name']];
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

    <style type='text/css' media='print'>
  #printLink {display : none}
  #divForGraph {display : none}
  #graphTitle {display : none}

</style>

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
      <td>&nbsp;&nbsp;<font size="6"><b>Iteration Report</b></font></td>
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
          loadIterarion();
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
  
  function loadIterarion(){

    $query = "SELECT DISTINCT i.name,i.startDate,i.endDate,i.PlannedVelocity,i.days FROM iteration i WHERE state='Planning' ORDER BY i.name ASC";
    $result = mysql_query($query);

    echo "<center><div style='width:100%'>
          State : Planned
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>
              <th width='15%'>END DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>DAYS</th>
            </tr> </thead> ";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td>
            <td>" . $row['PlannedVelocity'] . "</td><td>" . $row['days'] .  "</td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";


    $query = "SELECT DISTINCT i.name,i.startDate,i.endDate,i.PlannedVelocity,i.days FROM iteration i WHERE state='Committed' ORDER BY i.name ASC";
    $result = mysql_query($query);


    echo "<br><br>
          <center><div style='width:100%'>
          State : Committed
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>
              <th width='15%'>END DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>DAYS</th>
            </tr> </thead>";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td>
            <td>" . $row['PlannedVelocity'] . "</td><td>" . $row['days'] .  "</td></tr></tbody>";
    }

    echo "</table>
          </div>
          </center>";


    $query = "SELECT DISTINCT i.name,i.startDate,i.endDate,i.PlannedVelocity,i.days FROM iteration i WHERE state='Accepted' ORDER BY i.name ASC";
    $result = mysql_query($query);

    echo "<br><br>
          <center><div style='width:100%'>
          State : Accepted
          <table border=1>
             <thead ><tr align='center'>
              <th width='35%'>NAME</th>
              <th width='10%'>START DATE</th>
              <th width='15%'>END DATE</th>
              <th width='20%'>PLANNED VELOCITY</th>
              <th width='10%'>DAYS</th>
            </tr> </thead>";

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody align='center'><tr class='alt'><td>" . $row['name'] . "</td><td>" . $row['startDate'] . "</td><td>" . $row['endDate'] . "</td>
            <td>" . $row['PlannedVelocity'] . "</td><td>" . $row['days'] .  "</td></tr></tbody>";
    }



    echo "</table>
          </div>
          </center>";

  }

  function pdf(){
    require 'pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("amilamadhushanka", "b8f48a60b58276fdf8d5cc5600691cd2");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://newtechnosl.blogspot.com/');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"google.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
  }

?>
        
  
  
  </body>
</html>

