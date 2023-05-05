<?php
include_once "includes/database.php";
// if session exist (user signed in), redirect to index page
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php require "js/login.js.php"; ?>
</head>

<body>

    <h2>Login</h2>
    <form action="" method="post">
        <input type="hidden" id="action" value="login">
        <label for="email">Email</label>
        <input type="text" id="email"><br>
        <label for="">Password</label>
        <input type="password" name="" id="password"><br>
        <button id="button">Login</button>
    </form><br>
    <a href="register.php">Go to Register</a>
</body>

</html>