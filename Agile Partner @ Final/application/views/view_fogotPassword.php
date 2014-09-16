<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=<?php echo base_url('assets\images\favicon2.ico'); ?>>

	<title>Reset Password</title>

    <!-- Custom styles for this template -->
    <?php
      echo link_tag('assets/css/resetPassword.css');
      echo link_tag('assets/css/bootstrap.min.css');
    ?>

</head>
<body>

	<form class="form-resetPassword" role="form" method="post" action="http://agilepartner.comxa.com/index.php/login/reset_password"  >
        <br>
        <br>
        <h2 class="form-signin-heading">Reset Password</h2>
        <br>
        <input type="email" name="txtrEmail" class="form-control" placeholder="Email address" required value="<?php echo set_value('email') ?>" autofocus>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnResetPassword">Reset Password</button>
    <form>
      <?php
        echo validation_errors('<p style="color: red;">');
        if(isset($error)){
          echo '<br><br><p style="color: red;">'.$error.'</p>';
        }
      ?>

</body>
</html>