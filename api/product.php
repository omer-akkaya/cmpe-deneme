<?php
require_once "../includes/database.php";
// do not continue if user is not logged in
if (!$_SESSION["id"]) {
    exit();
}

// check if request method is GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["featured"] == true) {
    $sql = "SELECT * FROM products WHERE is_featured = 1";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode($rows);
}
?>