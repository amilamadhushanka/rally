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
        <link rel="shortcut icon" href="../../assets/ico/favicon2.ico">

        <title>User Details</title>

    <!-- Bootstrap core CSS -->
    
        <link href="./css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
        <link href="css/register.css" rel="stylesheet"> 
        <link href="css/add_project.css" rel="stylesheet">

    </head>

    <body>


      <?php       
           
      foreach ($result as $row) {

        $username = $row->username;  
        $firstName=$row->fName;
        $lastName=$row->lName;
        $phone=$row->phone;
        $company=$row->company;
        $country=$row->country;      

      }
     
      $url = "http://agilepartner.comxa.com/index.php/userDetails/get_values/".$_POST['selectProject'];
      ?>


<form role = "form" method = "post" action = "<?php echo $url; ?>" >


<table align = "center" border="0" style="width:auto" >
  <col width="250">
  <col width="705">

 <tr>
  <td> <h4 class="form-signin-heading" > <font color ="#0000FF"> User Details </font> </h4></td>
  
 </tr> 


<tr>
  <td  bgcolor="#FF0000"><label> User Details  </label></td>
          
         

  <td>
  
      <select name="selectProject" required style="width:450px; height:30px;" onChange="changeFunc();">
          <option value="" selected="true" style="display:none; ">«Select Project»</option>
            <?php 
              loadProject();
            ?>
        </select>
            <button name = "Load" style="width:120px">Load</button> 
  </td>

</tr>
</table>

<br>



<table align = "center" border="0" style="width:auto" >

<tr>
  <td  bgcolor="#FF0000"><label> First Name  </label></td>
  <td  bgcolor="#FF0000"><label> Last Name  </label></td>
  <td  bgcolor="#FF0000"><label> Phone  </label></td>
  <td  bgcolor="#FF0000"><label> Country  </label></td>
   
</tr>

<tr>
  
  <td><input type="text" id="txt" name="txtfname" class="form-control" style="width:237px"value= "<?php echo $firstName; ?>" readonly></td> 
  <td><input type="text" id="txt" name="txtlname" class="form-control" style="width:237px"value= "<?php echo $lastName; ?>" readonly>  </td>
  <td><input type="text" id="txt" name="txtphone" class="form-control" style="width:237px"value= "<?php echo $phone; ?>" readonly></td>
  <td><input type="text" id="txt" name="txtcountry" class="form-control" style="width:237px"value= "<?php echo $country; ?>" readonly></td>
</tr>


</table>



<br>



<table  align = "center" border="0" style="width:auto">

<tr >
  <td style = "width:237px"   bgcolor="#FF0000"><label> Assigned Project  </label></td>
  <td><input type="text" id="txt" name="txtassingProject" class="form-control" style="width:711px" value=" " readonly></td> 
</tr>

</table>
<br>


<table  align = "center" border="0" style="width:auto">
<tr>
  <td style = "width:237px"  bgcolor="#FF0000"><label> Team ID  </label></td>
  <td><input type="text" id="txt" name="txtteamID" class="form-control" style="width:711px" value=" " readonly></td> 
</tr>
</table>

<br>
<table  align = "center" border="0" style="width:auto">

<tr>
  <td style = "width:237px" bgcolor="#FF0000"><label> ON Going User Story  </label></td>
  <td><input type="text" id="txt" name="txtonGoingUserStory" class="form-control" style="width:711px" readonly></td> 
</tr>

</table>

<br>
<table  align = "center" border="0" style="width:auto">

<tr>
  <td style = "width:237px" bgcolor="#FF0000"><label> Started Date  </label></td>
  <td><input type="text" id="txt" name="txtstartedDate" class="form-control" style="width:711px" readonly></td> 
</tr>

</table>

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


?>


