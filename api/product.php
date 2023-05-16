<?php
require_once "../includes/database.php";
// Exit if user is not logged in. protect api route from unauthorized access.
if (!$_SESSION["id"]) {
    exit();
}

$req_method = $_SERVER["REQUEST_METHOD"];

// Send single product information 
if ($req_method == "GET" && isset($_GET["product_id"])) {
    global $conn;
    $product_id = $_GET["product_id"];
    try {
        $sql = "SELECT * FROM products WHERE id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows]);
        exit;
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured. Could not fetch products."]);
        exit;
    }

}

if ($req_method == "GET" && isset($_GET["category_id"]) && isset($_GET["sort_by"])) {
    global $conn;
    $category_id = $_GET["category_id"];
    $sort_by = $_GET["sort_by"];
    $query = "";
    if ($sort_by == "highest_first") {
        $query = "SELECT * from products WHERE category_id='$category_id' ORDER BY price DESC";
    } else if ($sort_by == "lowest_first") {
        $query = "SELECT * from products WHERE category_id='$category_id' ORDER BY price ASC";
    } else {
        $query = "SELECT * from products WHERE category_id='$category_id' ORDER BY price DESC";
    }
    try {
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $count = mysqli_num_rows($result);
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows, "count" => $count]);
        exit;
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
        exit;
    }
}

if ($req_method == "GET" && isset($_GET["category_id"])) {
    global $conn;
    $category_id = $_GET["category_id"];
    try {
        $query = "SELECT * from products WHERE category_id='$category_id'";
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $count = mysqli_num_rows($result);
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows]);
        exit;
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
        exit;
    }
}

// Send all products
if ($req_method == "GET") {
    global $conn;
    try {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows]);
        exit;
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "message" => "An error occured. Could not fetch products."]);
        exit;
    }
}
?>