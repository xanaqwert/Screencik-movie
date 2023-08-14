<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'registeration failed!';
         }
      }
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
   <title>register</title>
   <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
   <div class="form-wrapper register">
   <h2>Sign Up <span style='color: #34b3f1'>Screencik</span></h2>
      <form action="" method="post" enctype="multipart/form-data">
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <div class="form-control">
            <input type="text" name="name" class="box" required>
            <label>Enter username</label>
         </div>
         <div class="form-control">
            <input type="email" name="email" class="box" required>
            <label>Enter email</label>
         </div>
         <div class="form-control">
            <input type="password" name="password" class="box" required>
            <label>Enter password</label>
         </div>
         <div class="form-control">
            <input type="password" name="cpassword" class="box" required>
            <label>Confirm password</label>
         </div>
         <div class="form-control">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
         <button type="submit" name="submit" value="register now" class="btn">Sign up</button>
         <div class="form-help">
         </div>
      </form>
      <p style="margin-top:-2rem">Already have an account? <a href="login.php">Sign in now</a></p>
      <small>
         This page is protected by Google reCAPTCHA to ensure you're not a bot.
         <a href="https://www.google.com/recaptcha/about/">Learn more.</a>
      </small>

   </div>

</body>

</html>