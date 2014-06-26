<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>
    
    <title>Iteration</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/createIteration.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

  

    <?php echo link_tag('assets/jquery-ui/css/start/jquery-ui-1.10.4.custom.min.css'); ?>
    

</head>

<body>

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

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Update Testcase</h3>



<form class="form-iteration" role = "form" method = "post" action = "/Rally_CI/editTestcase/update" >

<div style="height:370px; overflow:scroll; border:thin solid; border-color:DarkGray;">

<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="700">

  <tr>
    <td style="text-align:right;"><label>Project Name &nbsp;</label></td>
    <td>
      <input type="text" id="pname" name="pname" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $pname; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;"><label>Iteration Name &nbsp;</label></td>
    <td>
      <input type="text" id="iName" name="iName" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $iName; ?>" readonly>
    </td> 
  </tr>

  <tr >
    <td >&nbsp;</td>
  </tr>

  <tr>
    <td style="text-align:right;"><label>User Story &nbsp;</label></td>
    <td>
      <input type="text" id="uid" name="uid" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $uid; ?>" readonly>
    </td> 
  </tr>

  <tr>
    <td style="text-align:right;"><label>Testcase ID &nbsp;</label></td>
    <td>
      <input type="text" id="tcid" name="tcid" class="form-control" style="width:450px; margin-top:5px;" value="<?php echo $tcid; ?>" readonly>
    </td> 
  </tr>


  <tr>
    <td style="text-align:right;"><label> Testcase Name  &nbsp;</label></td>
    <td><input type="text" id="tcName" name="tcName" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcName; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Work Product  &nbsp;</label></td>
    <td><input type="text" id="workProduct" name="workProduct" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $workProduct; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Type  &nbsp;</label></td>
    <td><input type="text" id="type" name="type" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $type; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Testcase Priority  &nbsp;</label></td>
    <td><input type="text" id="tcPriority" name="tcPriority" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcPriority; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Testcase Owner  &nbsp;</label></td>
    <td><input type="text" id="tcOwner" name="tcOwner" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $tcOwner; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Method  &nbsp;</label></td>
    <td><input type="text" id="method" name="method" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $method; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Last Verdict  &nbsp;</label></td>
    <td><input type="text" id="lastVerdict" name="lastVerdict" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastVerdict; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Last Built  &nbsp;</label></td>
    <td><input type="text" id="lastBuilt" name="lastBuilt" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastBuilt; ?>"></td>
  </tr>

  <tr>
    <td style="text-align:right;"><label> Last Run  &nbsp;</label></td>
    <td><input type="text" id="lastRun" name="lastRun" class="form-control" style="width:450px; margin-top:5px;"  value="<?php echo $lastRun; ?>"></td>
  </tr>

    
  </table>
  
  <tr>
    <td >&nbsp;</td>
  </tr> 

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
        <button style="width:120px" type="submit" name="save" id="save">Update</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>

  <?php echo validation_errors('<p style="color: red;">');?>

  </center>

</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html>


