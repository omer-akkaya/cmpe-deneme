<?php
// Start the session
session_start();

// Create required variables for database connection 
$servername = "localhost";
$username = "root";
$password = "";
$database = "cmpe-deneme";

// Connect to the database using variables.. 
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if connection exists
if (!$conn) {
    // If there is a problem connecting to the database stop script execution
    die("Problem connecting to the database");
}

// Continiue script if no problem exists...
?>