<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["id"];

if ($req_method == "GET" && !isset($_GET["action"])) {
    $sql = "SELECT * FROM basket WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows, "user_id" => $user_id]);
    exit;
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_num_rows") {
    $sql = "SELECT SUM(count) AS count FROM basket WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $row_count = $result["count"];
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "row_count" => $row_count]);
    exit;
}


if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_basket") {
    $sql = "SELECT basket.product_id, products.name, basket.count, products.price FROM basket LEFT JOIN products ON basket.product_id = products.id  WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row["total"] = number_format((float) $row["price"] * $row["count"], 2, '.', '');
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete_item" && isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $sql = "DELETE FROM basket WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => "success"]);
    exit;
}


if ($req_method == "POST") {
    $product_id = $_POST["product_id"];
    $sql = "SELECT * FROM basket WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        $sql = "UPDATE basket SET count = count+1 WHERE product_id = '$product_id' AND user_id = '$user_id'";
        mysqli_query($conn, $sql);
        exit;
    } else {
        $sql = "INSERT INTO basket(user_id,product_id,count) VALUES ('$user_id','$product_id','1')";
        mysqli_query($conn, $sql);
        exit;
    }
}
?>