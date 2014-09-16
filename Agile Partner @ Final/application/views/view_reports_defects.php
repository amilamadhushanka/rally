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

	<title>Defects</title>

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
          postfix: ' Defects',
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
        
        if(selectedValue=="id"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/id"
        }
        else if(selectedValue=="priority"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/priority"
        }
        else if(selectedValue=="severity"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/severity"
        }
        else if(selectedValue=="planEstimate"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/planEstimate"
        }
        else if(selectedValue=="creationDate"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/creationDate"
        }
        else if(selectedValue=="targetDate"){
          window.location.href ="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/targetDate"
        }
      }
  </script>

<style type='text/css' media='print'>
  #printLink {display : none}
  #divForGraph {display : none}
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
    <col width="1050">
    <col width="100">
    <tr>
      <td>
        <?php
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='".base_url('assets\images\logo.png')."'></img>";
        ?>
      </td>
      <td>&nbsp;&nbsp;<font size="6"><b>Defect Report</b></font>
        
        <font id="sort" style="margin-left:570px;"><b>Sort by :&nbsp;</b></font>
        <select id="sortBy" name="sortBy" onChange="changeFunc();" style="width:160px">
          <option value="id" <?php if($sortBy=='id') {
                                      echo 'selected';
                                    }
                                    else {
                                      echo '';
                                    }
                              ?>>ID</option>
          <option value="priority" <?php if($sortBy=='priority') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>Priority</option>
          <option value="severity" <?php if($sortBy=='severity') {
                                            echo 'selected';
                                          }
                                          else {
                                            echo '';
                                          }
                                    ?>>Severity</option>
          <option value="planEstimate" <?php if($sortBy=='planEstimate') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>Plan Estimate</option>
          <option value="creationDate" <?php if($sortBy=='creationDate') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>Creation Date</option>
          <option value="targetDate" <?php if($sortBy=='targetDate') {
                                                echo 'selected';
                                              }
                                              else {
                                                echo '';
                                              }
                                        ?>>Target Date</option>
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
        <font id="custom_report" style="margin-left:793px">
          <?php echo '<a href="http://agilepartner.comxa.com/index.php/reportsDefectsState/load/'.$project.'/id">Defects by State</a>'; ?>
        </font>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <font id="custom_report" style="margin-left:793px">
          <?php echo '<a href="http://agilepartner.comxa.com/index.php/reportsDefectsEnvironment/load/'.$project.'/id">Defects by Environment</a>'; ?>
        </font>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <font id="custom_report" style="margin-left:793px">
          <?php echo '<a href="http://agilepartner.comxa.com/index.php/reportsDefectsScheduleState/load/'.$project.'/id">Defects by Schedule State</a>'; ?>
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
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Defects# : &nbsp;<?php foreach ($defect_count as $row):
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
      if($defect_priority){
      echo "<p style='margin-left: 35px;'><u><b>Priority</b></u></p>";
      echo "<div style='margin-left: 35px;'><table>
            <thead align='center'><tr>
              <th></th>
              <th></th>
              <th></th>";

      foreach ($defect_priority as $row):
        if($row['priority']=='«No Entry»'){
          //
        }
        else{
          //echo $row['priority']."&nbsp;&nbsp;-&nbsp;".$row['cnt'],"<br>";
          echo "<tbody><tr class='alt'><td>" . $row['priority'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
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
      //severity
        if($defect_severity){
          echo "<p style='margin-left: 35px;'><u><b>Severity</b></u></p>";
          echo "<div style='margin-left: 35px;'>
                <table>
                  <thead align='center'><tr>
                    <th></th>
                    <th></th>
                    <th></th>";

          foreach ($defect_severity as $row):
            if($row['severity']=='«No Entry»'){
              //
            }
        else{
          echo "<tbody><tr class='alt'><td>" . $row['severity'] . "</td><td>&nbsp;-&nbsp;</td><td>" . $row['cnt'] . "</td>
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
      if($defect_priority){
        echo "<p style='margin-left: 35px;'><u><b>State</b></u></p>";
        echo "<div style='margin-left: 35px;'><table>
              <thead align='center'><tr>
                <th></th>
                <th></th>
                <th></th>";

        foreach ($defect_state as $row):
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
<br><br>

<?php if($general){ ?>
  <font size="5" style="margin-left:125px;"><b>General</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align='center'><tr>
              <th width='10%' style="text-align:center">ID</th>
              <th width='30%' style="text-align:center">NAME</th>
              <th width='40%' style="text-align:center">DESCRIPTION</th>
              <th width='20%' style="text-align:center">OWNER</th>

            </tr> </thead>
            <?php foreach ($general as $row): ?>
            <?php echo "<tbody align='left'><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td>
            <td>" . $row['fName'] . '&nbsp;' . $row['lName'] . "</td>
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

  <?php if($defect){ ?>
  <font size="5" style="margin-left:125px;"><b>Defect</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align='center'><tr>
              <th width='10%' style="text-align:center">ID</th>
              <th width='15%' style="text-align:center">STATE</th>
              <th width='15%' style="text-align:center">ENVIRONMENT</th>
              <th width='15%' style="text-align:center">PRIORITY</th>
              <th width='15%' style="text-align:center">SEVERITY</th>
              <th width='15%' style="text-align:center">CREATION DATE</th>
              <th width='15%' style="text-align:center">TARGET DATE</th>

            </tr> </thead>
            <?php foreach ($defect as $row): ?>
            <?php echo "<tbody align='left'><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['state'] . "</td><td>" . $row['environment'] . "</td>
            <td>" . $row['priority'] . "</td><td>" . $row['severity'] . "</td><td>" . $row['creationDate'] . "</td><td>" . $row['targetDate'] . "</td>
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

  <?php if($schedule){ ?>
  <font size="5" style="margin-left:125px;"><b>Schedule</b></font>
  <br><br>
  <center>
  <div style="width:1100px;" align="center">    
          <table border=1>
             <thead align='center'><tr>
              <th width='20%' style="text-align:center">ID</th>
              <th width='30%' style="text-align:center">SCHEDULE STATE</th>
              <th width='30%' style="text-align:center">ITERATION</th>
              <th width='20%' style="text-align:center">PLAN ESTIMATE</th>

            </tr> </thead>
            <?php foreach ($schedule as $row): ?>
            <?php echo "<tbody align='center'><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['scheduleState'] . "</td><td>" . $row['iteration'] . "</td>
            <td>" . $row['planEstimate'] . "</td>
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

  <center>
    <div id="wrapper">
      <?php
      foreach ($defect_count as $row):                                                                 
        if($row['cnt']){
          echo '<label id="graphTitle">Defect Count</label>';
          echo '<br><br>';
          echo '<div id="divForGraph"></div>';
        }
        else{
          echo '';
        }
      endforeach;
      
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
    $query=$this->db->query("SELECT DISTINCT i.name as iteration, COUNT( d.id ) AS cnt FROM defect d, iteration i WHERE i.project =  '$project'
                  AND i.name = d.iteration GROUP BY i.name");
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
