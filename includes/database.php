<?php
//start the session
session_start();

//create required variables for database connection 
$servername = "localhost";
$username = "root";
$password = "";
$database = "cmpe-deneme";

//connect to the database using variables.. 
$conn = mysqli_connect($servername, $username, $password, $database);

//check if connection exists
if (!$conn) {
    //if there is a problem connecting to the database stop script execution
    die("Problem connecting to the database");
}

//continiue script if no problem exists...
?>