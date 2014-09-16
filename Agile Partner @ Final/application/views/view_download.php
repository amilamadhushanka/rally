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
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>Version</title>

    <!-- Custom styles for this template -->

     <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/buttons.css');
      echo link_tag('assets/css/iterationTable.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');      
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

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

    <script>
      function openWinFiles()
      {
        window.open("http://agilepartner.comxa.com/index.php/demo","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=120, left=200, width=1000, height=400");
      }

      function openWinVersions()
      {
        window.open("http://agilepartner.comxa.com/index.php/version","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=120, left=200, width=1000, height=400");
      }

      function openWinGui()
      {
        window.open("http://agilepartner.comxa.com/index.php/images","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=200, left=200, width=1000, height=300");
      }

      function openWinReviewGui()
      {
        url="http://agilepartner.comxa.com/index.php/allImages";
        window.location.assign(url);  
      }
    </script>

</head>

<body>
  <label id="eventPosition" style="margin-left: 1350px;"></label>

  <?php 
      echo '<label style="color: #2E64FE"><h4>&nbsp;&nbsp;Project : '.$_SESSION['project'].'</h4></label>';
  ?>
  
<table>
    <col width="20">
    <col width="2">
    <col width="2">
    <col width="2">
    <tr>
      <td>
        &nbsp;
      </td>
      <?php 
      if($_SESSION['teamRole']=='Scrum Master'){
        echo '<td>
          <form>
            <button onclick="openWinFiles()" class="backlogButton">Upload Files</button>
          </form> 
        </td>
        <td >&nbsp;</td>
        <td>
          <form>
            <button onclick="openWinVersions()" class="backlogButton">Upload Version</button>
          </form>
        </td>
        <td >&nbsp;</td>';
      }
      ?>
        <td>
          <form>
            <button onclick="openWinGui()" class="backlogButton">Upload GUIs</button>
          </form>
        </td>
        <td >&nbsp;</td>
        <td>
          <form>
            <button onclick="openWinReviewGui()" type="button" class="backlogButton">GUI Feedback</button>
          </form>
        </td>
    </tr>
  </table>
  <br>
<form class="form-defect" enctype="multipart/form-data" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/download/getversion">

<div style="height:410px; width:1100px; overflow:scroll; overflow-x:hidden;">

<table >
  <tr>
    <td><h3>Veiw Documents</h3></td>
  </tr>
</table>

<div class="datagrid" style="width:1000px">
<table id="iterationTable" align="center" border="1" cellpadding="3" cellspacing="3">
  <thead>
  <tr>
  <th align="center" > Version Name</th>
  <th>Project File</th>
  <th>Database File</th>
  <th>Description</th>
  <th>Date</th>
  <th>Documnets</th>
</tr>
</thead>

            <tbody>
<?php foreach($query as $row): ?>
<tr class='alt'> 

    <td align="center" width="200"><?php echo "Version". $row->id; ?></td>
    
    <td align="center" width="15%">
      <?php
        if( $row->version_file ){
          ?>
          <a href=" "> <img src="assets/images/version.png"  height="32" width="40" /> </a>
          <?php
        }
      ?>
    </td>

    
    <td align="center" width="15%">
      <?php
        if( $row->data_base ){
          ?>
          <a href=" "> <img src="assets/images/database.png" height="32" width="32" /> </a>
          <?php
        }
      ?>
    </td>

    
    <td align="center" width="40%"><?php echo $row->description; ?></td>
    <td  align="center" width="15%"><?php echo $row->udate; ?></td>

    <td>
      <?php  loaddocuments($row->id); ?>
    </td>
    
    </tr>


    <?php endforeach; ?>

</tbody>
</table>
</div>


 
</div>

</form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html>


<?php

function loaddocuments($vid)
{

  $result = mysql_query("select ref,filename,file from files where ref=".intval($vid));

   
    while ($row1 = mysql_fetch_array($result)) {
     
      $d = $row1['filename'];
      $url = " ";

      
      echo "<a href=$url>$d</a>";
      echo "</br>";
      
    }
}


?>
