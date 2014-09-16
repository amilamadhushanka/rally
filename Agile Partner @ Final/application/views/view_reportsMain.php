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
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
      function openDefectsWin()
      {
        var selectedProject = txtProject.value;
        url="http://agilepartner.comxa.com/index.php/reportsDefects/load/"+selectedProject+"/id";
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openUserstoryWin()
      {
        var selectedProject = txtProject.value;
        url="http://agilepartner.comxa.com/index.php/reportsUserstory/load/"+selectedProject;
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openIvcWin()
      {
        var selectedProject = txtProject.value;
        url="http://agilepartner.comxa.com/index.php/iterationVelocityChart/load/"+selectedProject;
        window.location.assign(url);
      }
    </script>

    <script type="text/javascript">
      function openReleaseWin()
      {
        var selectedProject = txtProject.value;
        url="http://agilepartner.comxa.com/index.php/reportRelease/load/"+selectedProject;
        window.location.assign(url);
      }
    </script>
    <script type="text/javascript">
      function openTestcaseWin()
      {
        var selectedProject = txtProject.value;
        url="http://agilepartner.comxa.com/index.php/reportsTestcases/load/"+selectedProject+"/TC_id";
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
  
  <input type="hidden" id="txtProject" name="txtProject" value="<?php echo $_SESSION['project']; ?>" readonly>
  <br><br><br>
  <center>
  <div style="width:1000px;">
    <center>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="openDefectsWin();">Generate Defect Reports</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="openUserstoryWin();">Generate Userstory Reports</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="openTestcaseWin();">Generate Testcase Reports</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="openIvcWin();">Generate Iteration Velocity Chart Report</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="openReleaseWin();">Generate Release Report</button>
      
    </center>
  </div>
  </center>




  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
</body> 
</html>
