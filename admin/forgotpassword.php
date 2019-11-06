<?php

          
         include "include_files/connection.php";

       if (isset($_POST['login']))
        {
           
           $username_var = $_POST['input_username'];
           

          $query = "SELECT * FROM  user WHERE email='$username_var'";
           $run_query = mysqli_query($connection,$query) or die(mysqli_error($connection));


           if (mysqli_num_rows($run_query) == 1)
            {
              

               $row_result =  mysqli_fetch_array($run_query);
               $useremail = $row_result['email'];
               $username  = $row_result['name'];
               $pass  = $row_result['password'];

               $to ="$useremail";
               $subject = "Forgot password";
               $message = "Hi $username your password is '$pass'";
               $headers = "From: Groupchat.github.io";

               if(mail($to,$subject,$message,$headers))
                  {
                  echo "<script>alert('Your password has been sent to $useremail Please check your inbox.');</script>";
                  header("location:index.php");
                  }
               

               }
               else
               {
                echo "<script>alert('Email address Does not exists!');</script>";
               }
                
           }
           
       
       ?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Admin Side</b></a><br>
        <img src="a.png" alt="Logo" height="
        100px" width="100px">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Enter your email address</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="input_username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
        
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> --><!-- /.social-auth-links -->

        <a href="index.php">Back</a><br>
        
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
