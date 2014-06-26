<html>
<head>    

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>Setup</title>

    <!-- Custom styles for this template -->

   <?php
      echo link_tag('assets/css/navbar.css');
      echo link_tag('assets/css/bootstrap.min.css');

    ?>



</head>

<body>


<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid" >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

  </div><!-- /.container-fluid -->

  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="http://localhost/Rally_CI/home"><?php echo "<img src='".base_url('assets\images\home_icon.png')."'>"; ?></a></li>
        <li ><a href="#">USERS</a></li>
        <li ><a href="projects">WORKSPACES & PROJECTS</a></li>
        <li ><a href="#">SUBSCRIPTION</a></li>
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/Rally_CI/backlog"><?php echo "<img src='".base_url('assets\images\settings_icon.png')."'>"; ?> Setup</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
              echo "<img src='".base_url('assets\images\user_icon.png')."'>";
            ?>
             <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Settings</a></li>
            <li><a href="http://localhost/Rally_CI/message" onclick="javascript:void window.open('http://localhost/Rally_CI/message','1395886764992','width=800,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=300,top=50');return false;">Messages</a></li>
            <li><a href="#">Feedback</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="http://localhost/Rally_CI/logout"><font color="blue">Sign Out</font></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

    <div class="jumbotron">
        <form class="form-signin" role="form">
         <h2 class="form-signin-heading">Users</h2>
         
         <td ><a href="http://localhost/Rally_CI/createNewTeam" align = "center" onclick="javascript:void window.open('http://localhost/Rally_CI/createNewTeam','1393831394416','width=1000,height=620,toolbar=0,menubar=0,location=1,status=1,scrollbars=1,resizable=1,left=160,top=20');return false;"> Create Team</a></td>
         &#160 &#160
         <td><a href="http://localhost/Rally_CI/editTeam_selectTeam" onclick="javascript:void window.open('http://localhost/Rally_CI/editTeam_selectTeam','1395886463505','width=970,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=180,top=40');return false;">Edit Team</a></td>
          &#160 &#160
         <td><a href="http://localhost/Rally_CI/userDetails/get_Interface" onclick="javascript:void window.open('http://localhost/Rally_CI/userDetails/get_Interface','1395886463505','width=970,height=550,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,left=180,top=40');return false;">View User Details</a></td>
       </br> </br>

          <label>USER NAME </label>
          &#160  &#160 &#160 &#160   &#160   &#160  &#160  &#160   &#160  &#160   &#160  &#160   &#160  &#160                  
          <label>FIRST NAME</label> 
          &#160  &#160 &#160 &#160   &#160   &#160  &#160  &#160   &#160  &#160    &#160  &#160   &#160  &#160 
          <label>LAST NAME</label>
          &#160  &#160 &#160 &#160   &#160   &#160  &#160  &#160   &#160  &#160   &#160  &#160   &#160  &#160 
          <label>DISPLAY NAME</label>
          &#160  &#160 &#160 &#160   &#160   &#160  &#160  &#160   &#160  &#160   &#160  &#160   &#160  &#160 
          <label>DISABLED</label>
          &#160  &#160 &#160 &#160   &#160      
          <label>PERMISSION</label>
          &#160  &#160 
          <br/>

          <input type="text" id="User" placeholder="All" />
          &#160  &#160 &#160 &#160   &#160   &#160 
          <input type="text" id="FirstName" placeholder="All" />
          &#160  &#160 &#160 &#160   &#160   &#160
          <input type="text" id="Lastname" placeholder="All" />
          &#160  &#160 &#160 &#160   &#160   &#160 
          <input type="text" id="DisplayName" placeholder="All" />
          &#160  &#160 &#160 &#160   &#160   &#160
          <input type="text" id="Disabled"  style="width:100px" placeholder="All" />
          &#160  &#160 &#160  
          <input type="text" id="Permission"   style="width:100px" placeholder="All" />
        

        <!-- <TABLE>
         <link href="space.css" rel="stylesheet">
             <TR>
                 <TD><label>USER NAME</label></TD>
               
                  <TD><label>FIRST NAME</label></TD>
                
                  <TD><label>LAST NAME</label></TD>
                  <TD><label>DISPLAY NAME</label></TD>
                   <TD><label>DISABLED</label></TD>
                  <TD><label>PERMISSION</label></TD>

              </TR>
             <TR>
                  
                   <TD<input type="text" id="User" placeholder="All" /></TD>
                    <TD> <input type="text" id="FirstName" placeholder="All" /></TD>
               
              </TR>
  
          </TABLE>-->
         <br/>
         
       
        
        <!--<input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>-->
       
         <!-- <input type="checkbox" value="remember-me"> Remember me
        </label>-->
       
      </form>
      </div>


</nav>

	<?php

	?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.min.js'); ?>></script>
  
</body>	


</html>