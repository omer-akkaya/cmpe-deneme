<?php
require_once "../includes/database.php";

// exit if user is not logged in. protect api route from unauthorized access.
if (!$_SESSION["id"]) {
    exit();
}

$req_method = $_SERVER["REQUEST_METHOD"];

// check if request method is GET and id parameter is not defined
if ($req_method == "GET" && !isset($_GET["category_id"])) {
    $sql = "SELECT * FROM categories";
    try {
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
        echo json_encode(["code" => 400, "data" => "An error occured during fetching categories."]);
        exit;
    }
}

if ($req_method == "GET" && isset($_GET["category_id"])) {
    $category_id = $_GET["category_id"];
    $sql = "SELECT * FROM categories WHERE id = '$category_id'";
    try {
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
        echo json_encode(["code" => 400, "data" => "An error occured during fetching categories."]);
        exit;
    }
}
?>