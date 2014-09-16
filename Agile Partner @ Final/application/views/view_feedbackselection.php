<!--<?php
  if(!$_SESSION['email'] ){
    redirect('http://localhost/Rally_CI/login');
  }
?>-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>


     <title>Feedback</title>

 </head>

<body>
  <br><br><br><br>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feedback</h3>



<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/feedbackselection">

<div style="height:200; border:thin solid; border-color:DarkGray;">
<br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="2">
  <col width="100">

  <tr>&nbsp;</tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">Type   : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td><select id="type" name="selectType" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option  selected="true" style="display:none; ">Select Type</option>
          <option >Project</option>
          <option >User Story</option>
          <option >Task</option>
          <option >Test Case</option>
          <option >Defect</option>
          <option >User</option>
            
        </select>
    </td> 
  </tr>

   <tr>&nbsp;</tr>
   <tr>&nbsp;</tr>
   <tr>&nbsp;</tr>
   <tr>&nbsp;</tr>
   <tr>&nbsp;</tr>
   <tr>&nbsp;</tr>

  

</table>
<br>
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
        <button style="width:120px" type="submit" name="save" id="save" >Proceed</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
      </td>
    </tr>

    
  </table>
  </center>

</form>


</body>

</html>


<?php

function loadProject()
{
  $result = mysql_query("select * from project");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
}


?>
