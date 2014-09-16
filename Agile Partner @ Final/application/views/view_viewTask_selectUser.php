<?php
  if(!$_SESSION['email'] ){
    redirect('http://agilepartner.comxa.com/index.php/login');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>


     <title>Select User</title>

 </head>

<body>
  <br><br><br><br><br><br><br>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select User Name</h3>



<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/viewTask_selectUser">

<div style="height:200; border:thin solid; border-color:DarkGray;">
<br><br><br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="2">
  <col width="100">

  <tr>&nbsp;</tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">User Name   : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td><select id="user" name="select_user" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option  selected="true" style="display:none; ">Select User Name</option>
            <?php 
              loadUser();
            ?>
            
        </select>
    </td> 
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

function loadUser()
{
  $result = mysql_query("select * from users");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
    }
}


?>
