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

	<title>Test Cases</title>

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
          arrayOfDataJS[i] = [parseInt(elem['cnt']),elem['iteration']];
        });
        console.log(arrayOfDataJS);
        $('#divForGraph').jqBarGraph({
          data: arrayOfDataJS,
          barSpace: 20,
          postfix: ' Testcases',
          height: 200,
          color: '#01DFD7',
          showValues: true,
          animate: false,
        });
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        var arrayOfPHPData = <?php echo json_encode($graphPass) ?>;
        arrayOfDataJS = new Array();
        $.each(arrayOfPHPData, function (i, elem) {
          arrayOfDataJS[i] = [parseInt(elem['cnt']),elem['iteration']];
        });
        console.log(arrayOfDataJS);
        $('#divForPassGraph').jqBarGraph({
          data: arrayOfDataJS,
          barSpace: 20,
          postfix: ' Testcases',
          height: 200,
          color: '#01DFD7',
          showValues: true,
          animate: false,
        });
      });
    </script>

    <script type="text/javascript">
      function changeFunc() {
        
        var project = document.getElementById("selectedProject");
        var selectedProject=project.value;

        var sortBy = document.getElementById("sortBy");
        var selectedValue = sortBy.options[sortBy.selectedIndex].value;
        
        if(selectedValue=="TC_id"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/TC_id"
        }
        else if(selectedValue=="USid"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/USid"
        }
        else if(selectedValue=="IterationName"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/IterationName"
        }
        else if(selectedValue=="LastRun"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/LastRun"
        }
        else if(selectedValue=="LastBuilt"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/LastBuilt"
        }
      }
  </script>

<style type='text/css' media='print'>
  #printLink {display : none}
  #divForGraph {display : none}
  #divForPassGraph {display : none}
  #graphTitle {display : none}
  #sort {display : none}
  #sortBy {display : none}
  #custom_report {display : none}
</style>

</head>

<body>

  <div>
  <!--to store selected project -->
  <input type="hidden" id="selectedProject" name="selectedProject" value="<?php echo $project;?>">
  
  &nbsp;
  <center>
  <table>
    <col width="100">
    <col width="900">
    <col width="100">
    <tr>
      <td>
        <?php
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url('assets\images\logo.png')."'></img>";
        ?>
      </td>
      <td>&nbsp;&nbsp;<font size="6"><b>Failed Test Case Report</b></font>
        
        <font id="sort" style="margin-left:570px;"><b>Sort by :&nbsp;</b></font>
        <select id="sortBy" name="sortBy" onChange="changeFunc();" style="width:160px">
          <option value="TC_id" <?php if($sortBy=='TC_id') {
                                      echo 'selected';
                                    }
                                    else {
                                      echo '';
                                    }
                              ?>>Testcase ID</option>
          <option value="IterationName" <?php if($sortBy=='IterationName') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>Iteration</option>
          <option value="LastRun" <?php if($sortBy=='LastRun') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>Last Run</option>
          <option value="LastBuilt" <?php if($sortBy=='LastBuilt') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>Last Buld</option>
        </select>
      </td>

      <td>
        <?php echo "<img src='".base_url('assets\images\print_button.png')."' onclick='printPage()' id='printLink'></img>"?>
        <!-- <button id="printButton" name="printButton" onclick="printPage()" >Print</button> -->
      </td>
    </tr>

    <tr>
      <td></td>
      <td>
        <font id="custom_report" style="margin-left:848px">
          <?php echo '<a href="http://agilepartner.comxa.com/index.php/reportsTestcasesPass/load/'.$project.'/TC_id">Passed Testcases</a>'; ?>
        </font>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <font id="custom_report" style="margin-left:848px">
          <?php echo '<a href="http://agilepartner.comxa.com/index.php/reportsTestcasesFail/load/'.$project.'/TC_id">Failed Testcases</a>'; ?>
        </font>
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
	
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Testcases# : &nbsp;<?php foreach ($testcase_count as $row):
                                                                  echo $row['cnt']; 
                                                                endforeach; 
                                                          ?></b>
<center>
<table>
  <col width="300">
  <col width="300">
  <col width="300">
  <tr>
    <td valign="top">
      <?php
      
      //priority
      if($testcases_priority){
      echo "<p style='margin-left: 35px;'><u><b>Priority</b></u></p>";
      echo "<div style='margin-left: 35px;'><table>
            <thead align='center'><tr>
              <th></th>
              <th></th>
              <th></th>";

      foreach ($testcases_priority as $row):
        if($row['TC_Priority']=='«No Entry»'){
          //
        }
        else{
          echo "<tbody><tr class='alt'><td>" . $row['TC_Priority'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
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
      //Status
        if($testcase_status){
          echo "<p style='margin-left: 35px;'><u><b>Testcase Status</b></u></p>";
          echo "<div style='margin-left: 35px;'>
                <table>
                  <thead align='center'><tr>
                    <th></th>
                    <th></th>
                    <th></th>";

          foreach ($testcase_status as $row):
            if($row['testcaseStatus']=='«No Entry»'){
              //
            }
        else{
          echo "<tbody><tr class='alt'><td>" . $row['testcaseStatus'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
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
<br><br>

<?php if($testcase){ ?>
  <font size="5" style="margin-left:125px;"><b>General</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1 style="width:80%">
             <thead align='center'><tr>
              <th width='10%' style="text-align:center">ID</th>
              <th width='25%' style="text-align:center">NAME</th>
              <th width='30%' style="text-align:center">User Story</th>
              <th width='10%' style="text-align:center">ITERATION</th>
              <th width='25%' style="text-align:center">OWNER</th>

            </tr> </thead>
            <?php foreach ($testcase as $row): ?>
            <?php echo "<tbody align='center'><tr class='alt'><td>" . $row['TC_id'] . "</td><td>" . $row['TC_Name'] . "</td><td>" . $row['Name'] . "</td>
            <td>" . $row['IterationName'] . "</td><td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td>
            </tr></tbody>";
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

  <?php if($testcase){ ?>
  <font size="5" style="margin-left:125px;"><b>Testcases</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align='center'><tr>
              <th width='10%' style="text-align:center">Test Case #</th>
              <th width='15%' style="text-align:center">Description</th>
              <th width='15%' style="text-align:center">Pre Condition</th>
              <th width='20%' style="text-align:center">Test Procedure</th>
              <th width='20%' style="text-align:center">Test Inputs</th>
              <th width='20%' style="text-align:center">Expected Results</th>

            </tr> </thead>
            <?php foreach ($testcase as $row): ?>
            <?php echo "<tbody align='center'><tr class='alt'><td>" . $row['TC_id'] . "</td><td>" . $row['TC_Name'] . "</td>
            <td>" . $row['preCondition'] . "</td><td>" . $row['testProcedure'] . "</td><td>" . $row['testInputs'] . "</td><td>" . $row['expectedResults'] . "</td>
            </tr></tbody>";
            ?>
            <?php endforeach; ?>
            </table>
          </div>
          </center>
          <?php }
            else{
              //echo '';
            } 
          ?>

  <br><br>

  <?php if($testcase){ ?>
  <font size="5" style="margin-left:125px;"><b>Details</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align='center'><tr>
              <th width='10%' style="text-align:center">ID</th>
              <th width='15%' style="text-align:center">Work Product</th>
              <th width='10%' style="text-align:center">Type</th>
              <th width='10%' style="text-align:center">Testcase Priority</th>
              <th width='15%' style="text-align:center">Method</th>
              <th width='15%' style="text-align:center">Last Verdict</th>
              <th width='15%' style="text-align:center">Last Built</th>
              <th width='10%' style="text-align:center">Last Run</th>

            </tr> </thead>
            <?php foreach ($testcase as $row): ?>
            <?php echo "<tbody align='center'><tr class='alt'><td>" . $row['TC_id'] . "</td><td>" . $row['WorkProduct'] . "</td>
            <td>" . $row['Type'] . "</td><td>" . $row['TC_Priority'] . "</td><td>" . $row['Method'] . "</td><td>" . $row['LastVerdict'] . "</td>
            <td>" . $row['LastBuilt'] . "</td><td>" . $row['LastRun'] . "</td></tr></tbody>";
            ?>
            <?php endforeach; ?>
            </table>
          </div>
          </center>
          <?php }
            else{
              //echo '';
            } 
          ?>

  <br><br><br>

  <center>
    <div id="wrapper">
      <?php
        if($testcase_count){
          echo'
            <div style="width: 50%; float:left">
              <label id="graphTitle">Total Testcase Count</label>
              <br><br>
              <div id="divForGraph"></div>
            </div>
            <div style="width: 50%; float:right">
              <label id="graphTitle">Pass Testcase Count</label>
              <br><br>
              <div id="divForPassGraph"></div>
            </div>';
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

  <?php
    $query=$this->db->query("SELECT DISTINCT i.name as iteration, COUNT( t.TC_id ) AS cnt FROM testcase t, iteration i WHERE i.project =  '$project'
                  AND i.name = t.IterationName AND t.testcaseStatus='pass' GROUP BY i.name");

     
        if ($query->num_rows > 0) {
            return $query->result();
        }
        else {
            return FALSE;
        }
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
</body>
</html>
