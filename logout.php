<?php
//start the session
session_start();
//assign to session an empty array 
$_SESSION = [];
// remove all session variables
session_unset();
// destroy the session 
session_destroy();
// redirect user to login page
header("Location: login.php")
    ?>