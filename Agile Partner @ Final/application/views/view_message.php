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

        <title>User Details</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>



<form role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/message/sendMessage" >


<table align = "center" border="0" style="width:auto" >
  <col width="250">
  <col width="705">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> Convertation </font> </h4></td>
  <td></td>
  <td> 
    <a href="http://agilepartner.comxa.com/index.php/inbox/get_interface"><font color="blue">Inbox</font></a>
  </td>
 </tr> 


<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> From : &nbsp;</label></td>
          
         

  <td>
    <?php $from=$_SESSION['email']; ?>

    <input style="width:300px; border: none; box-shadow: none" type="text" id="from" name="from" class="form-control" value=" <?php echo $from; ?>" readonly>
           
  </td>

</tr>
<tr>
  <td  style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> To : &nbsp;</label></td>         
         
  <td>
  
      <select style="width:300px;" name="to" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select»</option>
            <?php 
              loadProject();
            ?>
        </select>
             
  </td>

</tr>

<tr><td>&nbsp;</td></tr>

<tr>

  <td style = "text-align:right;"  bgcolor="#2E64FE"><label style="color: #FFFFFF"> Message : &nbsp;</label></td>
  <td><textarea rows="3" name="txtmessage" style="width:450px; height:230px;"></textarea></td> 
  
</tr>


<tr>  
  <td>
  </td>
  <td>
    <br>
    
    <button name = "send" style="width:200px">Send Message</button>
    
    <button name = "close" style="width:200px" onclick="window.close()">Close</button>
    
  </td>
</tr>

</table>
</form>
</body>
</html>

  


<?php

function loadProject()
{

  $result = mysql_query("SELECT username from users");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
    }
}

function send(){

  

}


?>


