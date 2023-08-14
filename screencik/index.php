<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
  header('location:login.php');
};

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>screencik</title>
  <link rel="stylesheet" href="./assets/css/style.css" />
  <meta name="title" content="screencik" />
  <meta name="description" content="screencik is a popular movie app made by sahl, gopur, alim" />
  <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <script src="./assets/js/global.js" defer></script>
  <script src="./assets/js/index.js" type="module"></script>
</head>

<body>
  <!-- Header -->

  <header class="header">
    <a href="./index.php" class="logo">
      <img src="./assets/images/logo-blue.png" alt="screencik home" width="140" height="32" />
    </a>
    <div class="search-box">
      <div class="search-wrapper" search-wrapper>
        <input type="text" name="search" aria-label="search movies" placeholder="Search any movies" class="search-field" search-field autocomplete="off" />
        <img src="./assets/images/search.png" width="24" height="24" alt="search" class="leading-icon" />
      </div>

      <button class="search-btn max-disable" search-toggler>
        <img src="./assets/images/close.png" width="24" height="24" alt="close search box" />
      </button>
    </div>

    <button class="search-btn max-disable" search-toggler menu-close>
      <img src="./assets/images/search.png" width="24" height="24" alt="open search box" />
    </button>

    <button class="menu-btn" menu-btn menu-toggler>
      <img src="./assets/images/menu-close.png" width="24" height="24" alt="open menu" class="close" />
      <img src="./assets/images/menu.png" width="24" height="24" alt="close menu" class="menu" />
    </button>
  </header>

  <!-- SIDEBAR -->
  <main>
    <nav class="sidebar" sidebar>
      <div class="sidebar-list">
        <div class="profile">
          <?php
          $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
          if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
          }
          if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
          } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
          }
          ?>
          <h3><?php echo $fetch['name']; ?></h3>
          <a href="update_profile.php" class="more-info" style="margin-top:1rem; margin-left:3px;"><box-icon name='edit' type='solid' rotate='270' color='#34b3f1'></box-icon></a>
          <a href="home.php?logout=<?php echo $user_id; ?>" class="more-info" style="margin-top:1rem"><box-icon name='log-out' color='#34b3f1' ></box-icon></a>
        </div>
      </div>
    </nav>

    <div class="overlay" overlay menu-toggler></div>
    <article class="container" page-content></article>
  </main>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>