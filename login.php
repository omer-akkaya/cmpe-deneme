<?php
// start session
session_start();
// if session exist (user signed in), redirect to index page
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
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
    <?php require "js/script.php"; ?>
</body>