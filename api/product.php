<?php
require_once "../includes/database.php";
// exit if user is not logged in. protect api route from unauthorized access.
if (!$_SESSION["id"]) {
    exit();
}

$req_method = $_SERVER["REQUEST_METHOD"];

// check if request method is GET and featured parameter is set to true
if ($req_method == "GET" && isset($_GET["featured"])) {
    global $conn;
    try {
        $sql = "SELECT * FROM products WHERE is_featured = 1";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        header("Content-type: application/json");
        echo json_encode($rows);
    } catch (\Throwable $th) {
        echo "eror";
    }

}

// Send specific product information 
if ($req_method == "GET" && isset($_GET["id"])) {
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


if ($req_method == "GET" && isset($_GET["category_id"])) {
    global $conn;
    $category_id = $_GET["category_id"];
    $sort_by = $_GET["sort_by"];
    try {
        $query = "SELECT * from products WHERE category_id='$category_id'";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_array($result)) {
            $rows[] = $row;
        }
        $count = mysqli_num_rows($result);
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows, "rowCount" => $count, "sort_by" => $sort_by]);
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
    }
}
?>