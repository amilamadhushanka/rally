<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon.ico'); ?>>

    <title>Reset Password</title>

    <!-- Custom styles for this template -->

    <?php
    echo link_tag('assets/css/signin.css');
    echo link_tag('assets/css/bootstrap.min.css');
    ?>

  </head>

  <body>

    <div class="container">
        <br>
        <br>
    	<h2>Successfully Sent</h2>
		<br>
		<p>Password reset mail successfully sent. 
           You can reset your password by logging to your email : <?php echo (isset($email)) ? $email : ''; ?></p>

        <br>
        <button style="width:120px" name="close" onclick="window.close()">Close</button>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

