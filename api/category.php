<?php
require_once "../includes/database.php";

// exit if user is not logged in
if (!$_SESSION["id"]) {
    exit();
}

// check if request method is GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode($rows);
}

?>