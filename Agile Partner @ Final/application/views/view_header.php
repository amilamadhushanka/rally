<html>
<head>    

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <!-- Custom styles for this template -->

    <?php
      echo link_tag('assets/css/register.css');
      echo link_tag('assets/css/add_project.css');
      echo link_tag('assets/css/bootstrap.min.css');
      echo link_tag('assets/css/defectsTable.css');
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

      <ul class="nav navbar-nav">
        
        
        <li><a href="http://agilepartner.comxa.com/index.php/home"><?php echo "<img src='".base_url('assets\images\home_icon.png')."'>"; ?></a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/backlog">BACKLOG</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/plan">PLAN</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/viewTasks">TASKS</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/track">TRACK</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/testCases">QUALITY</a></li>
        <li ><a href="http://agilepartner.comxa.com/index.php/reports">REPORTS</a></li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://agilepartner.comxa.com/index.php/search"><?php echo "<img src='".base_url('assets\images\search_icon.png')."'>"; ?></a></li>
        <li><a href="http://agilepartner.comxa.com/index.php/createTeam"><?php echo "<img src='".base_url('assets\images\settings_icon.png')."'>"; ?></a></li>
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
            <li><a href="<?php echo 'http://agilepartner.comxa.com/index.php/mySettings/get_values/'.$_SESSION['email'];?>">My Settings</a></li>
          <?php
          if($_SESSION['teamRole']=='Scrum Master'){
            echo'<li><a href="http://agilepartner.comxa.com/index.php/events">Create Event</a></li>';
          }
          ?>
            <li><a href="http://agilepartner.comxa.com/index.php/myEvents">My Events</a></li>
            <li><a href="http://agilepartner.comxa.com/index.php/message" onclick="javascript:void window.open('http://agilepartner.comxa.com/index.php/message','1395886764992','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Messages</a></li>
            <li><a href="http://agilepartner.comxa.com/index.php/feedbackselection" onclick="javascript:void window.open('http://agilepartner.comxa.com/index.php/feedbackselection','1395886764992','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Feedback</a></li>
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
</body>
</html>
