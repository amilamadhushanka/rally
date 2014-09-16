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
    
    <title>Testcase</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets\jBox-master\Source\jBox.css');
    ?>

    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-1.10.2.js'); ?>></script>
    <script type="text/javascript" src=<?php echo base_url('assets/jquery-ui/js/jquery-ui-1.10.4.custom.min.js'); ?>></script>
    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>

    <script type="text/javascript" src=<?php echo base_url('assets\jBox-master\Source\jBox.min.js'); ?>></script>

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/testCases";
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
    foreach ($result as $row) {
      $iName=$row->IterationName;
      $uid=$row->USid;
      $tcid=$row->TC_id;
      $tcName=$row->TC_Name;
      $workProduct=$row->WorkProduct;
      $type=$row->Type;
      $tcPriority=$row->TC_Priority;
      $tcOwner=$row->TC_Owner;
      $method=$row->Method;
      $lastVerdict=$row->LastVerdict;
      $lastBuilt=$row->LastBuilt;
      $lastRun=$row->LastRun;
      $pname=$row->pname;
    }
    
  ?>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Testcase</h3>



<form class="form-iteration" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/deleteTestcase/delete" enctype="multipart/form-data" onSubmit="return confirm('Are you sure you want to delete this testcase?')" >

<div style="height:460px; overflow:scroll; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF">Project Name &nbsp;</label></td>
    <td>
      <input type="text" id="pname" name="pname" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $pname; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Iteration Name &nbsp;</label></td>
    <td>
      <input type="text" id="iName" name="iName" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $iName; ?>" readonly>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>User Story &nbsp;</label></td>
    <td>
      <input type="text" id="uid" name="uid" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $uid; ?>" readonly>
    </td> 
  </tr> 

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td bgcolor="#A9C2DB" colspan="4"><font size="3" color="blue">General</font></td>
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label>Testcase ID &nbsp;</label></td>
    <td>
      <input type="text" id="tcid" name="tcid" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $tcid; ?>" readonly>
    </td> 
  </tr>


  <tr>
    <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: FFFFFF"> Testcase Name  &nbsp;</label></td>
    <td><input type="text" id="tcName" name="tcName" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcName; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Work Product  &nbsp;</label></td>
    <td><input type="text" id="workProduct" name="workProduct" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $workProduct; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Type  &nbsp;</label></td>
    <td><input type="text" id="type" name="type" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $type; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Testcase Priority  &nbsp;</label></td>
    <td><input type="text" id="tcPriority" name="tcPriority" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcPriority; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Testcase Owner  &nbsp;</label></td>
    <td><input type="text" id="tcOwner" name="tcOwner" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcOwner; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Method  &nbsp;</label></td>
    <td><input type="text" id="method" name="method" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $method; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Last Verdict  &nbsp;</label></td>
    <td><input type="text" id="lastVerdict" name="lastVerdict" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastVerdict; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"><label> Last Built  &nbsp;</label></td>
    <td><input type="text" id="lastBuilt" name="lastBuilt" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastBuilt; ?>" readonly></td>
  </tr>

  <tr>
    <td style="text-align:right;" bgcolor="#D8DFE6"> <label> Last Run  &nbsp;</label></td>
    <td><input type="text" id="lastRun" name="lastRun" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastRun; ?>" readonly></td>
  </tr>

    
  </table>

</table>
</div>

  <center>
  <table>
    <tr>
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
      </td> 
      <td>
        <button style="width:120px" type="submit" name="delete" id="delete">Delete</button>
        <button style="width:120px" type="button" name="cancel" id="cancel" onclick="goBack()">Cancel</button>
        
      </td>
    </tr>

    
  </table>

  <?php //echo validation_errors('<p style="color: red;">');?>

  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html>


