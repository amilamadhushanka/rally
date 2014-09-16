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
    
    <title>Version</title>

    <!-- Custom styles for this template -->

     <?php
      echo link_tag('assets/css/addDefects.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

</head>

<body>
<br>
<form class="form-defect" enctype="multipart/form-data" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/version/iupload">

<div style="height:auto; border:thin solid; border-color:DarkGray; background-color:#3BB9FF">

<table>
  <tr>
    <td><h3>Upload Version</h3></td>
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
    <td><label>Verion Name (id) :</label></td>
    <td>
      <label>Verion</label>     
      <INPUT id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="txtid"   value ="<?php  versionName(); ?> " required > 
    </td>
  </tr>

  <tr>   
    <td><label>Verion File :</label></td>
    <td>
      <input type="file" name="version_file" required></input>
    </td>
  </tr>

  <tr>   
    <td><label>DataBase File :</label></td>
    <td>
      <input type="file" name="database_file" required></input>
    </td>
  </tr>

  

  <tr>    
    <td><label>Date :</label></td>
    <td><label name = "cdate" ><?php currdate(); ?> </label></td>
  </tr>

  <tr>    
    <td><label>Description :</label></td>
    <td>
      <textarea value " " name="txtdescription" rows="4" cols="85" required ></textarea>
    </td>
  </tr>

  <tr>    
    <td><label>Date :</label></td>
    <td>
      <INPUT type="date" value=" " name = "datepicker" required ></INPUT>
    </td>
  </tr>

  

</table>
<script type="text/javascript"></script>

<script >
  $( ".select_project" ).change(function() {
  alert( "Handler for .change() called." );
})

</script>

<SCRIPT type="text/javascript">

          function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

             return true;
          }

       </SCRIPT>



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

    $d = date('d/m/Y ');
    echo $d;

}

function versionName(){

  //$id ;
  
  $result = mysql_query("select MAX(id) from versions");


    while ($row = mysql_fetch_array($result)) {
     $val = intval($row[0])+1;
     echo $val;
    }


}

function cal_model(){

  echo "i am called";
}


?>
