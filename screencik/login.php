<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   } else {
      $message[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico" />
   <title>login</title>
   <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>

   <!-- <nav>
      <a href="#"><img src="./assets/images/logo-blue.png" alt="logo"></a>
   </nav> -->
   <div class="form-wrapper login">
      <h2>Sign In <span style='color: #34b3f1'>Screencik</span></h2>
      <?php
      if (isset($message)) {
         foreach ($message as $message) {
            echo '<div class="message" style="color: red">' . $message . '</div>';
         }
      }
      ?>
      <form action="" method="post" enctype="multipart/form-data">
         <div class="form-control">
            <input type="email" name="email" class="box" required>
            <label>Email or username</label>
         </div>
         <div class="form-control">
            <input type="password" name="password" class="box" required>
            <label>Password</label>
         </div>
         <button type="submit" name="submit" value="login now" class="btn">Sign In</button>
         <div class="form-help">
            <div class="remember-me">
               <input type="checkbox" id="remember-me">
               <label for="remember-me">Remember me</label>
            </div>
            <a href="#">Need help?</a>
         </div>
      </form>
      <p style="margin-top:-1rem">New to screencik? <a href="register.php">Sign up now</a></p>
      <small>
         This page is protected by Google reCAPTCHA to ensure you're not a bot.
         <a href="https://www.google.com/recaptcha/about/">Learn more.</a>
      </small>
   </div>
</body>

</html>