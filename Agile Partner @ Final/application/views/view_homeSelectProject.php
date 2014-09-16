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
    
    <title>Select Project</title>

    <!-- Custom styles for this template -->

     <?php
      echo link_tag('assets/css/selectProject.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

</head>

<body>

  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <?php echo "<img src='".base_url('assets\images\logo.png')."'>"; ?>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >


      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
              $user=$_SESSION['email'];
              $query = $this->db->query("SELECT pic FROM users WHERE username='$user'");
              $row = $query->row_array();

              if($row){
                $mime = "image/jpeg";
                $b64Src = "data:".$mime.";base64," . base64_encode($row["pic"]);
                echo '<img src="'.$b64Src.'" height="42" width="40" />';
              }
            ?>
            <?php
              //echo "<img src='".base_url('assets\images\user_icon.png')."'>";
            ?> 
             
             <b class="caret"></b></a>
          
          <ul class="dropdown-menu">
            <li><a href="https://www.yumpu.com/en/document/embed/7rdMbWZs6MuguCrf" onclick="javascript:void window.open('https://www.yumpu.com/en/document/embed/7rdMbWZs6MuguCrf','1395886764992','width=900,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">User Manual</a></li>
            <li class="divider"></li>
            <li><a href="http://agilepartner.comxa.com/index.php/logout"><?php echo "<img src='".base_url('assets\images\logout.png')."'>";
            ?>&nbsp;&nbsp;Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br><br><br><br><br><br><br>

<form class="form-defect" role = "form" method = "post" action = "http://agilepartner.comxa.com/index.php/homeSelectProject">

<div id="box" style="border: 2px; border-radius: 30px; box-shadow: 0px 0px 30px 30px #FFFFFF; 
                      height:250px; width:520px;align:center; margin-left:190px;">

<center>
  <?php
    $firstName = $_SESSION['fName'];
    echo "<h2>Welcome, {$firstName}</h2>";
  ?>
<br>
<label><h3>Select Project</h3></label>

<br><br>

  <div id="selectProjec" style="border: 2px; box-shadow: 0px 0px 8px 8px #2E64FE; 
                      height:30px; width:350px;align:center;">
        <select id="project" name="select_project" required style="width:350px; height:30px;" autofocus>
          <?php 
            foreach ($projectCount as $row):
              if($row['cnt']==0){
                echo '<option value="newProject" selected>Create New Project</option>';
              }
            endforeach;
          
            foreach ($projects as $row):
              echo '<option value="' . $row['projectName'] .'">' . $row['projectName'] .'</option>';
            endforeach;
          ?>
        </select>
    <br><br><br>
    <button style="width:150px; height:45px;" class="btn btn-lg btn-primary btn-block" type="submit" name="save" id="save" >Proceed</button>
  </div>
  
</center>
</div>

</form>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>

</body>

</html>

