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
    
    <title>Upload Image</title>

    <!-- Custom styles for this template -->

     <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/addDefects.css');
    ?>

</head>

<body>
<br><br>
<form class="form-defect" enctype="multipart/form-data" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/images/iupload">

<div style="height:auto; border:thin solid; border-color:DarkGray; background-color:#3BB9FF">

<table>
  <tr>
    <td><h3>Screen Shots</h3></td>
  </tr>
</table>
<table align = "center" border="0" style="width:auto" >
  <col width="200">
  <col width="2">
  <col width="100">

  <tr>    
    <td><label>Project :</label></td>
    <td>
      <INPUT id="project" type="text" name="select_project"   value ="<?php echo $_SESSION['project']; ?> " style="border: none; box-shadow: none" required readonly> 
    </td>
  </tr>

  <tr>   
    <td><label>Image :</label></td>
    <td>
      <input type="file" name="image_file" multiple></<input>
    </td>
  </tr>

  <tr>    
    <td><label>Date :</label></td>
    <td><label name = "cdate" ><?php currdate(); ?> </label></td>
  </tr>



</table>
<script type="text/javascript"></script>

<script >
  $( ".select_project" ).change(function() {
  alert( "Handler for .change() called." );
})

</script>


<br>

  <center>
  <table>
    <tr>
      <td >&nbsp;</td>
    </tr>
    <tr>  
      <td>
      </td>
      <td>
        <button style="width:120px" type="submit" name="upload" id="save" >Upload</button>
        <button style="width:120px" name="cancel" onclick="window.close()">Cancel</button>
              
      </td>
    </tr>

    
  </table>
  </center>
  <br>
</div>
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

function currdate(){

    $d = date('Y-m-d H:i:s');
    echo $d;

}


?>
