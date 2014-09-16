<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

    <title>Sign in</title>

    <!-- Custom styles for this template -->

    <?php
    echo link_tag('assets/css/signin.css');
    echo link_tag('assets/css/bootstrap.min.css');

    ?>


    <script>
      function openWin()
      {
        window.open("http://agilepartner.comxa.com/index.php/resetPassword","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=150, left=360, width=600, height=325");
      }
    </script>

  </head>

  <body style="overflow:hidden;">
    <div style="width: 100%;height: 638px;">

    <div style="width: 50%; height=auto; height: inherit; float:left;">
        <img src= <?php echo base_url('assets\images\background1.png'); ?> height="638" width="100%">
    </div>

    <div style="width:50%;height:inherit;float:left">
    <div class="container">

      <br><br><br><br><br><br>
      <form class="form-signin" role="form" method="post" action="http://agilepartner.comxa.com/index.php/login/login_user"  >

        <h2 class="form-signin-heading">Sign in</h2>
        <br>
        <input type="email" name="txtEmail" class="form-control" placeholder="Email address" 
        required value="<?php if(isset($entered_email)){echo $entered_email;}else {echo set_value('txtEmail');} ?>"
        <?php if(!isset($entered_email)){echo 'autofocus';} ?>>

        <input type="password" name="txtPassword" class="form-control" placeholder="Password" required autofocus>
        
        <?php echo validation_errors('<p style="color: red;">');?>
        
        <!--

        <label class="checkbox">
          <input type="checkbox" name="remember" value="1" > Remember me
        </label>

      -->
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogin">Sign in</button>
        <br>
        <center>
       <a href=<?php echo "http://agilepartner.comxa.com/index.php/login/reset_password"; ?> onclick="javascript:void window.open('http://agilepartner.comxa.com/index.php/fogotPassword','1393836897034','toolbar=yes, scrollbars=yes, resizable=no, top=180, left=330, width=700, height=290');
        return false;">Forgot your password?</a>
      </center>
      <br>
        <center><b>Not registered yet?</b>&nbsp;<a href="http://agilepartner.comxa.com/index.php/register">Sign Up Here</a></center>
        
      </form>

        

    </div>
    </div> <!-- /container -->
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
