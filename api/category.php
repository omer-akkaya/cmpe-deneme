<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];

if ($req_method == "GET" && !isset($_GET["category_id"])) {
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "GET" && isset($_GET["category_id"])) {
    $category_id = $_GET["category_id"];
    $sql = "SELECT * FROM categories WHERE id = '$category_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}
?>