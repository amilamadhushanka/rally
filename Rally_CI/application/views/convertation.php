 
      

<html>
    <head>
	   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>Conversation</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>






<form role = "form" method = "post"  >




<br>


<table  align = "center" border="0" style="width:auto">
<tr>

  <td style = "width:237px"  bgcolor="#FF0000"><label> Message  </label></td>
  <?php 
    $msg= loadMessages($you, $he); 
  ?>
  <td><textarea rows="15" name="txtmessage" style="width:711px" > <?php  echo $msg; ?> </textarea></td> 
  
</tr>


<tr>  
  <td>
  </td>
  <td>
    <br>
    
   
    
    
  </td>
</tr>

</table>
</form>
</body>
</html>


<?php

function loadMessages($you, $he){



  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("SELECT * FROM `convertation` WHERE sender ='".$you."' and reciever = '".$he."'");
  //print_r($result);

    $message = "";    

    while ($row = mysql_fetch_array($result)) {
      
      $message =  $message.$row['sender']."\r\n".$row ['messages']."\r\n"."\r\n";
      
    }
    return $message;
  

}

?>
  




