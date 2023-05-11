<?php
include_once "includes/database.php";
// if session exist (user signed in), redirect to index page
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<head>
    <title>Login</title>
    <?php
    require "js/login.js.php";
    require "styles/login.css.php";
    ?>
</head>

<body>
    <!-- header starts-->
    <header>
        <div class="header-flex">
            <div>iMed Logo</div>
        </div>
        </div>
    </header>
    <!-- header ends-->
    <main>
        <h2>Login</h2>
        <form action="" method="post" autocomplete="off">
            <input type="hidden" id="action" value="login">
            <label for="">Email</label>
            <input type="email" id="email">
            <label for="">Password</label>
            <input type="password" name="" id="password">
            <button id="button1">Login</button>
            <button id="button2">Go to register</button>
        </form>
    </main>

    <!-- footer section starts-->
    <?php include "includes/footer.php" ?>
    <!-- footer section ends-->
</body>

</html>