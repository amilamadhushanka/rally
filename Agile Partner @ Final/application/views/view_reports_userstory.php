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

	<title>Userstory</title>

	<?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/buttons.css');
    ?>

    <script type="text/javascript" src="http://www.workshop.rs/jqbargraph/jquery.js"></script>
    <script type="text/javascript" src="http://www.workshop.rs/jqbargraph/jqBarGraph.js"></script>

  <script>
    function printPage() {
      window.print();
    }
</script>

<script type="text/javascript" src=<?php echo base_url('assets/js/jqBarGraph.min.js'); ?>></script>
    
    <script type="text/javascript">
      $(document).ready(function () {
        var arrayOfPHPData = <?php echo json_encode($graph) ?>;
        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {
          arrayOfDataJS[i] = [parseInt(elem['Plan_estima']),elem['ID']];
        });
        console.log(arrayOfDataJS);
        $('#divForGraph').jqBarGraph({
          data: arrayOfDataJS,
          title: "Plan Estimate",
          barSpace: 20,
          postfix: '',
          height: 200,
          color: '#01DFD7',
          showValues: true,
        });
      });
    </script>

<style type='text/css' media='print'>
  #printLink {display : none}
  #divForGraph {display : none}
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
      <td>&nbsp;&nbsp;<font size="6"><b>Userstory Report</b></font></td>
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

</center>  
	
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Userstory# : &nbsp;<?php foreach ($us_count as $row):
                                                                echo $row['cnt']; 
                                                              endforeach; 
                                                        ?>
<center>
<table>
  <col width="300">
  <col width="300">
  <col width="300">
  <tr>
    <td valign="top">
      <?php
      
      //priority
      if($us_priority){
      echo "<p style='margin-left: 35px;'><u><b>Priority</b></u></p>";
      echo "<div style='margin-left: 35px;'><table>
            <thead align='center'><tr>
              <th></th>
              <th></th>
              <th></th>";

      foreach ($us_priority as $row):
        if($row['Priority']=='«No Entry»'){
          //
        }
        else{
          //echo $row['priority']."&nbsp;&nbsp;-&nbsp;".$row['cnt'],"<br>";
          echo "<tbody><tr class='alt'><td>" . $row['Priority'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
            </tr></tbody>";
        }
      endforeach;
      echo '</table></div>';
      }
      else{
        echo '';
      }
      ?>
    </td>
    
    <td valign="top">

      
    <?php
      //state
      if($us_priority){
        echo "<p style='margin-left: 35px;'><u><b>State</b></u></p>";
        echo "<div style='margin-left: 35px;'><table>
              <thead align='center'><tr>
                <th></th>
                <th></th>
                <th></th>";

        foreach ($us_state as $row):
          if($row['state']=='«No Entry»'){
            //
          }
        else{
          //echo $row['priority']."&nbsp;&nbsp;-&nbsp;".$row['cnt'],"<br>";
          echo "<tbody><tr class='alt'><td>" . $row['state'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
            </tr></tbody>";
        }
        endforeach;
        echo '</table></div>';
      }
      else{
        echo '';
      }
      ?>

    </td>
  </tr>
</table>
</center>
<br>

<?php if($userstory){ ?>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align="center"><tr>
              <th width='10%'>ID</th>
              <th width='35%'>NAME</th>
              <th width='10%'>PLAN ESTIMATE</th>
              <th width='15%'>PRIORITY</th>
              <th width='20%'>OWNER</th>
              <th width='10%'>ITERATION</th>
            </tr> </thead>
            <?php foreach ($userstory as $row): ?>
            <?php echo "<tbody align='center'><tr class='alt'><td>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Plan_estima'] . "</td>
            <td>" . $row['Priority'] . "</td><td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td>
            <td>" . $row['iteration'] . "</td></tr></tbody>";
            ?>
            <?php endforeach; ?>
            </table>
          </div>
          </center>
          <?php }
            else{
              echo '<center><b>No Records Found!</b></center>';
            } 
          ?>
  

  <br><br>
  <center>
    <div id="wrapper">
      <?php
        if($us_priority){
          echo '<div id="divForGraph"></div>';
        }
        else{
          echo '';
        }
      ?>
    </div>
  </center>
  <br>
  <br>

  <center>
  <div style="position: relative">
    <p style="position: relative; bottom: 0; width:100%; text-align: center">
        This report is generated by <?php date_default_timezone_set('Asia/Colombo'); echo $_SESSION['fName']."&nbsp;".$_SESSION['lName'].
        "&nbsp;"."(".date('m/d/Y H:i').")"; ?></p>
  </div>
  </center>
  </div>

</body>
</html>
