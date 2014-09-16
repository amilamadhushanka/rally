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

    <title>Home</title>


    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/add_project.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

     <script type="text/javascript">
      $(document).ready(function () {
        var notify = document.getElementById("notifyCount").value;
        if (notify!=0) {
        var options={
          color:'green',
          target: $('#notificationPosition'),
          position: {
            x: 'left',
            y: 'top'
          },
          outside: 'x',
          ajax: 'http://agilepartner.comxa.com/index.php/notificationDefect',
           reload: true,
          adjustPosition: true,
          adjustTracker: true,
        };
        new jBox('Notice',options);
        };
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function () {
        var notify = document.getElementById("eventNotifyCount").value;
        if (notify!=0) {
        var options1={
          color:'red',
          target: $('#eventPosition'),
          position: {
            x: 'left',
            y: 'top'
          },
          outside: 'x',
          ajax: 'http://agilepartner.comxa.com/index.php/notificationEvent',
           reload: true,
          adjustPosition: true,
          adjustTracker: true,
          autoClose:false,
        };
        new jBox('Notice',options1);
        };
      });
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
  <div style="height:540px; overflow:scroll; overflow-x:hidden;">

    <div id="notiful"></div>

    <input type="hidden" id="notifyCount" value="<?php 
                                                    foreach ($notifyCount as $row) {
                                                      echo $row['cnt'];
                                                    }
                                                ?>">
     <input type="hidden" id="eventNotifyCount" value="<?php 
                                                    foreach ($eventNotifyCount as $row) {
                                                      echo $row['cnt'];
                                                    }
                                                ?>">
    <label id="eventPosition" style="margin-left: 1350px;"></label>
    <br><br><br>
    <?php 
      echo '<label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>';
    ?>
    <label id="notificationPosition" style="margin-left: 1350px;"></label>    

  <?php
    $firstName = $_SESSION['fName'];
    echo "<h2>&nbsp;Welcome, {$firstName}</h2>";
    $project = $_SESSION['project'];
  ?>

 
  <table align = "center" border="0">
  <col width="650">
  <col width="650">
  <tr>
  <td>
  &nbsp;<b>MY USERSTORIES</b>
  <div>
  <?php
    if(isset($_SESSION['email'])){
      loadUserstories($_SESSION['email']);
    }
  ?>
  <br>
  &nbsp;<b>MY DEFECTS</b>
  <div>
  <?php
    if(isset($_SESSION['email'])){
      loadDefects($_SESSION['email']);
    }
  ?>
   <br>
  
  </td>
  <td>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    

    <div><object width="640" height="450"><param name="movie" value="http://pf.kizoa.com/sflite.swf?did=11937018&k=S122377721&hk=1&ns=1&ob=1&origin=share"></param><param name="wmode" value="transparent"></param><param name="allowFullScreen" value="true"></param><embed src="http://pf.kizoa.com/sflite.swf?did=11937018&k=S122377721&hk=1&ns=1&ob=1&origin=share" type="application/x-shockwave-flash" wmode="transparent" width="640" height="480" allowFullScreen="true"></embed></object><br /></div>


  </td>
  </tr>
  </table>

  </div>
</div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
</body> 
</html>

<?php
  
   function loadDefects($owner){
    $project=$_SESSION['project'];
    $query = "SELECT DISTINCT d.id,d.name,d.priority,d.owner,d.state FROM defect d,users u WHERE d.owner='$owner' AND d.project='$project' ORDER BY d.id ASC";
    $result = mysql_query($query);

    echo '<div class="datagrid" style="width:600px">
          <table id="defectsTable" class="table_US" >
             <thead><tr>
              <th width="10%">ID</th>
              <th width="35%">NAME</th>
              <th width="15%">PRIORITY</th>
              <th width="10%">STATE</th>
            </tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td>
            <td>" . $row['priority'] . "</td><td>" . $row['state'] . "</td></tr></tbody>";
    }

    echo "</table>
          </div>";

  }

  function loadUserstories($owner){

    $project=$_SESSION['project'];
    $query = "SELECT DISTINCT s.ID,s.Name,s.Priority,s.Owner,s.state FROM userstory s,users u WHERE s.Owner='$owner' AND s.pname='$project' ORDER BY s.ID ASC";
    $result = mysql_query($query);

    echo '<div class="datagrid" style="width:600px">
          <table id="defectsTable" class="table_US" >
             <thead><tr>
              <th width="10%">ID</th>
              <th width="35%">NAME</th>
              <th width="15%">PRIORITY</th>
              <th width="10%">STATE</th>
            </tr> </thead>';

    while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
      
      echo "<tbody><tr class='alt'><td>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td>
            <td>" . $row['Priority'] . "</td><td>" . $row['state'] . "</td></tr></tbody>";
    }

    echo "</table>
          </div>";
  }

?>
