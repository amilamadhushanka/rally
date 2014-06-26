
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



<form role = "form" method = "post" action = "/Rally_CI/message/sendMessage" >


<table align = "center" border="0" style="width:auto" >
  <col width="250">
  <col width="705">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> Convertation </font> </h4></td>
  <td></td>
  <td> 
    <a href="http://localhost/Rally_CI/inbox/get_interface"><font color="blue">Inbox</font></a>
  </td>
 </tr> 


<tr>
  <td  bgcolor="#FF0000"><label> From  </label></td>
          
         

  <td>
  
      <select name="from" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select Project»</option>
            <?php 
              loadProject();
            ?>
        </select>
           
  </td>

</tr>
<tr>
  <td  bgcolor="#FF0000"><label> To  </label></td>         
         
  <td>
  
      <select name="to" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select Project»</option>
            <?php 
              loadProject();
            ?>
        </select>
             
  </td>

</tr>
</table>

<br>
<br>
<br>
<br>
<br>

<table  align = "center" border="0" style="width:auto">
<tr>

  <td style = "width:237px"  bgcolor="#FF0000"><label> Message  </label></td>
  <td><textarea rows="3" name="txtmessage" style="width:711px"></textarea></td> 
  
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
  mysql_connect("localhost","root","");
  mysql_select_db("rally");
  $result = mysql_query("SELECT username from users");

    while ($row = mysql_fetch_array($result)) {
      echo '<option value="' . $row['username'] .'">' . $row['username'] .'</option>';
    }
}

function send(){

  

}


?>


