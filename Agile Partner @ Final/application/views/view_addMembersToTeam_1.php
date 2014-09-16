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

    <title>Create new team</title>

    <?php
        echo link_tag('assets/css/addDefects.css');
        echo link_tag('assets/css/bootstrap.min.css');
    ?>

</head>
<body>
<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/addMembersToTeam_1">
<div id="container">
	
<br><br>
<h3>Add Member To Team</h3>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="500">


  <tr>
  <td bgcolor="#D8DFE6" colspan="4"> Project Information  </td>
   </tr>

<tr >
            <td >&nbsp;</td>
</tr>

<tr>
  <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Team ID : </label></td>
  <td><input type="text" id="team" name="team" value="<?php echo $team;?>" style="width:450px" readonly> </td> 

</tr>

<tr>
  <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> Project Name : </label></td>
 <td>
    <input type="text" id="project" name="project" value="<?php echo $project;?>" style="width:450px" readonly>
 </td>

  <tr >
            <td   >&nbsp;</td>
</tr>

</tr>

  <tr>
  <td bgcolor="#D8DFE6" colspan="4"> Account Information  </td>
   </tr>

<tr >
            <td >&nbsp;</td>
</tr>

<tr>
  <td style="text-align:right;" bgcolor="#2E64FE"><label style="color: #FFFFFF"> User Name : </label></td>
  <td>
      <input type="text" id="UserName" name="UserName" value="<?php echo $username;?>" style="width:450px" readonly>
  </td> 
</tr>


<tr>

<tr><td style="text-align:right;" bgcolor="#F0F8FF">Name:</td>


  <td> <label> First Name :</label></td>
 
    
  <td> <label> Last Name :</label></td>
  
 </tr>

 <tr>
   
    <td bgcolor="#F0F8FF">&nbsp;</td>
     
    <td><input type="text" id="FirstName" name="FirstName"  value="<?php echo set_value('FirstName');?>" style="width:200px" readonly></td> 
    
         
    <td><input type="text" id="lastName" name="LastName" value="<?php echo set_value('LastName');?>" style="width:200px" readonly></td>

 </tr> 

<tr>
<td  style="text-align:right;" class = "spaced" bgcolor="#F0F8FF">  Office Location:
</td>
<td>
    <input type="text" id="location" name="location" value="<?php echo set_value('location');?>" style="width:200px" autofocus>
</td>
</tr>

<tr >
    <td >&nbsp;</td>
</tr>

<td  colspan="4" bgcolor="#D8DFE6" >Permission
 </td>
 </tr>

 <tr >
            <td >&nbsp;</td>
</tr>
<tr bgcolor="#F0F8FF">&nbsp;</tr>
 <tr><td style="text-align:right;" bgcolor="#F0F8FF">Role: </td>
 
<td>
<select name="role" value="<?php echo set_select('role');?>" required autofocus style="width:200px;">
    
                <option value="No entry" selected style="display:none;">
                    «Select Role»
                </option>
            
                <option value="Product Owner" >
                    Product Owner
                </option>
            
                <option value="Scrum Master" >
                    Scrum Master
                </option>
            
                <option value="Architect" >
                    Architect
                </option>
            
                <option value="Developer" >
                    Developer
                </option>
            
                <option value="Tester" >
                    Tester
                </option>
            
                <option value="Technical Writer" >
                    Technical Writer
                </option>
            
                <option value="User Experience" >
                    User Experience
                </option>
            
</select>
</td>
</tr>

<tr>
  <td style="text-align:right;" bgcolor=" #F0F8FF"> <label> Permission : </label></td>
  <td>
    <select id="permission" name="permission" required style="width:200px;" autofocus required>
          <option value="" selected="true" style="display:none;">«Select Permission»</option>
          <option value="default">Default</option>
          <option value="edit">Edit</option>
          <option value="edit/delete">Edit/Delete</option>
          <option value="delete">Delete</option>
    </select>
  </td> 
</tr>

<tr >
            <td >&nbsp;</td>
</tr>


<tr>  
  <td>
  </td>
  <td>
    <button style="width:120px" name="save_new">Add Member</button>
    <button style="width:97px" name="cancel" onclick="window.close()">Cancel</button>
  </td>
</tr>

</table>


<center>
    <?php echo validation_errors('<p style="color: red;">');?>
</center>

</form>
</body>
</html>