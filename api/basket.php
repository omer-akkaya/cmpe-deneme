<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["id"];


if ($req_method == "GET" && !isset($_GET["action"])) {
    $sql = "SELECT * FROM basket WHERE user_id = '$user_id'";
    try {
        $result = mysqli_query($conn, $sql);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "data" => $rows, "user_id" => $user_id]);
        exit;
    } catch (\Throwable $th) {
        header("Content-type: application/json");
        echo json_encode(["code" => 400, "data" => "An error occured during fetching categories."]);
        exit;
    }
}

if ($req_method == "GET" && isset($_GET["action"])) {
    if ($_GET["action"] == "get_num_rows") {
        $sql = "SELECT * FROM basket WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($result);
        header("Content-type: application/json");
        echo json_encode(["code" => 200, "row_count" => $row_count]);
        exit;
    } else {
        exit;
    }
}

if ($req_method == "POST") {
    $product_id = $_POST["product_id"];
    $sql = "SELECT * FROM basket WHERE product_id = '$product_id' AND user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        $sql = "UPDATE basket SET count = count+1 WHERE product_id = '$product_id' AND user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM basket WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($result);
        header("Content-type: Application/json");
        echo json_encode(["code" => 200, "row_count" => $row_count]);
        exit;
    } else {
        $sql = "INSERT INTO basket(user_id,product_id,count) VALUES ('$user_id','$product_id','1')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM basket WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($result);
        header("Content-type: Application/json");
        echo json_encode(["code" => 200, "row_count" => $row_count]);
        exit;
    }
}
?>