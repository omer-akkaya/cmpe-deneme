<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "cmpe-deneme";

$conn = mysqli_connect($servername, $username, $password, $database);

$req_method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["id"];
?>