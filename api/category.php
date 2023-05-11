<?php
require_once "../includes/database.php";

// exit if user is not logged in. protect api route from unauthorized access.
if (!$_SESSION["id"]) {
    exit();
}

// check if request method is GET and id parameter is not defined
if ($_SERVER["REQUEST_METHOD"] == "GET" && !isset($_GET["id"])) {
    //sql query for getting all categories from database
    $sql = "SELECT * FROM categories";
    //execute query on current connection
    $result = mysqli_query($conn, $sql);
    //turn result into a php array using while loop
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    //inform client that we will send json data
    header("Content-type: application/json");
    //turn php array to json and send to client
    echo json_encode($rows);
}

?>