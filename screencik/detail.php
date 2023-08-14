<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <meta name="description" content="screencik is a popular movie app made by sahl, gopur, alim" />
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <script src="./assets/js/global.js" defer></script>
    <script src="./assets/js/detail.js" type="module"></script>
</head>

<body>
    <!-- Header -->

    <header class="header">
        <a href="./index.php" class="logo">
            <img src="./assets/images/logo-blue.png" alt="screencik home" width="140" height="32">
        </a>
        <div class="search-box">
            <div class="search-wrapper">
                <input type="text" name="search" aria-label="search movies" placeholder="Search any movies"
                    class="search-field" search-field autocomplete="off">
                <img src="./assets/images/search.png" width="24" height="24" alt="search" class="leading-icon">
            </div>

            <button class="search-btn max-disable" search-toggler>
                <img src="./assets/images/close.png" width="24" height="24" alt="close search box">
            </button>

        </div>

        <button class="search-btn max-disable" search-toggler menu-close>
            <img src="./assets/images/search.png" width="24" height="24" alt="open search box">
        </button>

        <button class="menu-btn" menu-btn menu-toggler>
            <img src="./assets/images/menu.png" width="24" height="24" alt="open menu" class="menu">
            <img src="./assets/images/menu-close.png" width="24" height="24" alt="close menu" class="close">
        </button>
    </header>



    <!-- SIDEBAR -->
    <main>
    <nav class="sidebar" sidebar></nav>
    <div class="overlay" overlay menu-toggler></div>
    <article class="container" page-content></article>
    </main>
</body>

</html>