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
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>
    
    <title>User Permission</title>

    <!-- Custom styles for this template -->

     <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

    <script type="text/javascript">
      function goBack(){
        url="http://agilepartner.comxa.com/index.php/Rally_CI/createTeam";
        window.location.assign(url);
      }
    </script>

</head>

<body>
  <br><br>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change User Permission</h3>

  <?php
    foreach ($result as $row) {
      $user=$row->fName.'&nbsp;'.$row->lName;
      $role=$row->role;
      $title=$row->title;
      $userName=$row->username;
      $permission=$row->permission;
    }
  ?>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/userPermission/update">

<div style="height:300; border:thin solid; border-color:DarkGray;">
<br><br><br>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="2">
  <col width="100">

  <tr>&nbsp;</tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">Team : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td>
      <input type="text" id="txt" name="txtTeam" class="form-control" style="width:200px; border: none; box-shadow: none" value="<?php echo $_SESSION['team']; ?>" readonly> </td> 
    </td> 
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">User : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td>
      <input type="text" id="txt" name="txtUser" class="form-control" style="width:200px; border: none; box-shadow: none" value="<?php echo $user; ?>" readonly> </td> 
      <input type="hidden" id="txt" name="txtUserName" value="<?php echo $userName; ?>" readonly> 
    </td> 
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">Registered As : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td>
      <input type="text" id="txt" name="txtRegRole" class="form-control" style="width:200px; border: none; box-shadow: none" value="<?php echo $title ; ?>" readonly> </td> 
    </td> 
  </tr>
  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">Team Role : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td>
      <input type="text" id="txt" name="txtRole" class="form-control" style="width:200px; border: none; box-shadow: none" value="<?php echo $role; ?>" readonly> </td> 
    </td> 
  </tr>

  <tr>
    <td bgcolor="#2E64FE" style="text-align:right;"><label style="color: #FFFFFF">Permission : &nbsp;</label></td>
    <td>&nbsp;</td>
    <td><select id="project" name="permission" required style="width:200px;" autofocus required>
          <option value="" selected="true" style="display:none; ">«Select Permission»</option>
          <option value="default" <?php if($permission=='default') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Default</option>
          <option value="edit" <?php if($permission=='edit') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Edit</option>
          <option value="edit/delete" <?php if($permission=='edit/delete') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Edit/Delete</option>
          <option value="delete" <?php if($permission=='delete') {
                                          echo 'selected';
                                        }
                                        else {
                                          echo '';
                                        }
                                  ?>>Delete</option>
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
        <button style="width:120px" type="submit" name="save" id="save" >Change</button>
        <button style="width:120px" type="button" name="cancel" onclick="goBack();">Cancel</button>
      </td>
    </tr>

    
  </table>
  </center>

</form>

</body>
</html>
