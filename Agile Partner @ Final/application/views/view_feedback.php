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
        

        <title>Feedback</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>



<form role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/feedback" >


<table align = "center" border="0" style="width:auto" >
  <col width="250">
  <col width="705">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> Feedback </font> </h4></td>
  <td></td>
  
 </tr> 


<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> From : &nbsp;</label></td>
          
         

  <td>
    <?php $from=$_SESSION['email'];  ?>

    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="from" class="form-control" value=" <?php echo $from; ?>" readonly>
           
  </td>

</tr>

<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Type : &nbsp;</label></td>
          
         

  <td>
    <?php $from=$_SESSION['email'];  ?>

    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="type" class="form-control" value=" <?php echo $type; ?>" readonly>
           
  </td>

</tr>


<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Feedback For : &nbsp;</label></td>         
         
  <td>
  
      <select style="width:300px;" name="nfeedbackfor" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select»</option>
            <?php 
              loadDetails($type);
            ?>
        </select>
             
  </td>

</tr>

<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Date : &nbsp;</label></td>
          
         

  <td>
    <?php $date=  date('l, F jS, Y');  ?>

    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="cdate" class="form-control" value=" <?php echo $date; ?>" readonly>
           
  </td>

</tr>

<tr><td>&nbsp;</td></tr>

<tr>

  <td style = "text-align:right;"  bgcolor="#2E64FE"><label style="color: #FFFFFF"> Feedback : &nbsp;</label></td>
  <td><textarea rows="3" name="txtfeedback" style="width:450px; height:230px;" required></textarea></td> 
  
</tr>


<tr>  
  <td>
  </td>
  <td>
    <br>
    
    <button name = "send" style="width:200px">Send</button>
    
    <button name = "close" style="width:200px" onclick="window.close()">Close</button>
    
  </td>
</tr>

</table>
</form>
</body>
</html>

  


<?php

function loadDetails($type)
{
  

  if ($type =='Project') {
    # code...
    $result = mysql_query("SELECT name from project");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['name'] .'">' . $row['name'] .'</option>';
    }
  }
  if ($type =='User Story') {
    # code...
    $result = mysql_query("SELECT Name from userstory");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['Name'] .'">' . $row['Name'].'</option>';
    }
  }
  if ($type =='Task') {
    # code...
    $result = mysql_query("SELECT task_name from newtask ");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['task_name'] .'">' . $row['task_name'] .'</option>';
    }
  }
  if ($type =='Test Case') {
    # code...
    $result = mysql_query("SELECT TC_id from testcase");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['TC_id'] .'">' . $row['TC_id'] .'</option>';
    }
  }
  if ($type =='Defect') {
    # code...
    $result = mysql_query("SELECT id from defect");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['id'] .'">' . $row['id'] .'</option>';
    }
  }
  if ($type =='User') {
    # code...
    $result = mysql_query("SELECT username from users");
    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
    }
  }
  
    
}



?>


