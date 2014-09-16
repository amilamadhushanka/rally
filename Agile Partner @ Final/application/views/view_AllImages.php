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

    <title>GUIs</title>

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/add_project.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
      echo link_tag('assets/css/buttons.css');
    ?>
</head>
<body>
  <div style="height:540px; overflow:scroll; overflow-x:hidden;">

<?php
          $project=$_SESSION['project'];
          $query = "SELECT id, image FROM image where project='$project'";
          $result =$this->db->query($query);  // mysql_query($query);

          echo '<center><div>
          <table>
            <tbody>';

              foreach($result->result() as $row){   //Creates a loop to loop through results
                $mime = "image/jpeg";
                $b64Src = "data:".$mime.";base64," . base64_encode($row->image);

                echo '<table border=1>';
                echo '<tr><td>  <a href=http://agilepartner.comxa.com/index.php/viewImage?img_id='.$row->id .'>
                <img src="'.$b64Src.'" height="400" width="500"/>
              </td></tr>';
                echo '</table><tr><td>&nbsp;</td></tr>';

              }

              echo "</tbody></table>
          <div></center>";
   ?>
   
</body>
</html>
      