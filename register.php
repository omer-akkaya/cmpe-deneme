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
    <title>Register</title>
</head>

<body>
    <h2>Register</h1>
        <form action="" method="post" autocomplete="off">
            <input type="hidden" id="action" value="register">
            <label for="">Name</label>
            <input type="text" name="" id="name"><br>
            <label for="">Email</label>
            <input type="text" id="email"><br>
            <label for="">Password</label>
            <input type="password" name="" id="password"><br>
            <button id="button">Register</button>
        </form><br>
        <a href="login.php">Go to login</a>
        <?php require "js/script.php"; ?>
</body>