
<html>
    <head>
	   <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>User Details</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>

  
<form role = "form" method = "post" action = "/Rally_CI/inbox/sendMessage" >


<table align = "center" border="0" style="width:auto" >
  <col width="250">
  <col width="705">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> Convertation </font> </h4></td>
  
 </tr> 


<tr>
  <td  bgcolor="#FF0000"><label> From  </label></td>
          
         

  <td>
  
      <select name="froms" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select Sender»</option>
            <?php 
              loadProject();
            ?>
        </select>
           
  </td>

</tr>
<tr>
  <td  bgcolor="#FF0000"><label> To  </label></td>         
         
  <td>
  
      <select name="tos" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select Reciever»</option>
            <?php 
              loadProject();
            ?>
        </select>
         <button  name = "send" style="width:200px">   See</button>
             
  </td>

</tr>
</table>

<br>


<table  align = "center" border="0" style="width:auto">
<tr>

  <td style = "width:237px"  bgcolor="#FF0000"><label> Message  </label></td>
  <td><textarea rows="15" name="txtmessage" style="width:711px"></textarea></td> 
  
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

function loadProject()
{
  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("SELECT username from users");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
    }
}

function loadMessages(){

  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("SELECT * FROM `convertation` WHERE sender ='".$you."' and reciever = '".$he."'");

    while ($row = mysql_fetch_array($result)) {
      //echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
      echo $row [messages];
    }
  

}


?>


