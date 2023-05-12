<?php
require_once "../includes/database.php";
// exit if user is not logged in. protect api route from unauthorized access.
if (!$_SESSION["id"]) {
    exit();
}

// check if request method is GET and featured parameter is set to true
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["featured"])) {
    //create the query for selecting all bestseller products from the database
    $sql = "SELECT * FROM products WHERE is_featured = 1";
    //run query against database
    $result = mysqli_query($conn, $sql);
    //turn mysqli array into php array
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    //inform client in the header that we send json data
    header("Content-type: application/json");
    //turn php array into json and send it 
    echo json_encode($rows);
}

// Send specific product information 
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    global $conn;
    // Assign incoming id query parameter to a $id variable 
    $id = $_GET["id"];
    try {
        $query = "SELECT * from products WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        //turn mysqli array into php array
        $rows = [];
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        //inform client in the header that we send json data
        header("Content-type: application/json");
        //turn php array into json and send it 
        echo json_encode(["code" => 200, "data" => $rows]);
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
    }
}
?>