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

    <title>Reports</title>


    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/add_project.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
      echo link_tag('assets/css/buttons.css');
    ?>

    <script type="text/javascript">
      function openDefectsWin()
      {
        var selectedValue = selected_project.options[selected_project.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedValue+"/id";
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openUserstoryWin()
      {
        var usSelectedValue = us_selected_project.options[us_selected_project.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/reportsUserstory/load/"+usSelectedValue;
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openIvcWin()
      {
        var ivcSelectedValue = ivc_selected_project.options[ivc_selected_project.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/iterationVelocityChart/load/"+ivcSelectedValue;
        window.location.assign(url);
      }
    </script>

    <script type="text/javascript">
      function openReleaseWin()
      {
        var releaseSelectedValue = release_selected_project.options[release_selected_project.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/reportRelease/load/"+releaseSelectedValue;
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openTestcaseWin()
      {
        var tcrSelectedValue = tcr_selected_project.options[tcr_selected_project.selectedIndex].value;
        url="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+tcrSelectedValue+"/TC_id";
        window.location.assign(url);
      }
    </script>

</head>

<body>
<div style="width:1300px;height:540px; overflow:scroll; overflow-x:hidden;" align="center">
<table>
  <col width="600">
  <col width="600">
  
  <tr>
    <td style="padding-right: 50px; padding-left: 50px;">
  <form>
    <br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Defect Reports</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="selected_project" name="selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openDefectsWin();">Generate Report</button>
        <br><br>
      </td>
    </tr>
    </table>
    </div>
  </div>
</form>
</td>

<td style="padding-right: 50px; padding-left: 50px;">
<form>
  <br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Userstory Reports</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="us_selected_project" name="us_selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        <tr>
          
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openUserstoryWin()">Generate Report</button>
        <br><br>
      </td>
    </tr>
    </table>
    </div>
  </div> 

  </form>
  </td>
</tr>

<tr>
  <td style="padding-right: 50px; padding-left: 50px;">
  <form>
  <br><br><br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Iteration Velocity Chart</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="ivc_selected_project" name="ivc_selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        <tr>
          
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openIvcWin()">Generate Report</button>
        <br><br>
      </td>
    </tr>

    
    </table>
    </div>
  </div> 

  </form>
</td>

   <td style="padding-right: 50px; padding-left: 50px;">
  <form>
  <br><br><br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Release Report</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="release_selected_project" name="release_selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        <tr>
          
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openReleaseWin()">Generate Report</button>
        <br><br>
      </td>
    </tr>

    </table>
    </div>
  </div> 

  </form>
</td>

</tr>


<tr>
  <td style="padding-right: 50px; padding-left: 50px;">
  <form>
  <br><br><br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Testcase Report</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="tcr_selected_project" name="tcr_selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        <tr>
          
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openTestcaseWin()">Generate Report</button>
        <br><br>
      </td>
    </tr>

    
    </table>
    </div>
  </div> 

  </form>
</td>

<!--

   <td style="padding-right: 50px; padding-left: 50px;">
  <form>
  <br><br><br>
  <div style="border: 2px solid; border-radius: 10px; box-shadow: 10px 10px 5px #888888; 
              background-color:#0174DF;width:100%; margin-left: 10px;">
    <div align="center">
      <br>
    <table>
      <tr>
        <label style="color: FFFFFF"> <b>Release Report</b></label>
      </tr>
      <br><br>
      <tr>
      <td>
        <table>
        <tr>
          <td>
            <label style="color: FFFFFF"> Project : &nbsp; </label>
          </td>
          <td><select id="release_selected_project" name="release_selected_project" required style="width:300px; height:30px; margin-bottom:5px;" onChange="changeFunc();" autofocus>
              <?php 
                loadProject();
              ?>
              </select>
          </td>
        </tr>
        <tr>
          
        </tr>
        </table>
        <br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="openReleaseWin()">Generate Report</button>
        <br><br>
      </td>
    </tr>
    
    </table>
    </div>
  </div> 

-->

  </form>
</td>

</tr>



  </table>
  <br>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
</body> 
</html>

<?php

function loadProject()
{
  $result = mysql_query("select * from project");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
    echo '<option value="All" selected="true">All</option>';
}

?>