<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["id"];


if ($req_method == "GET") {
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

if ($req_method == "POST") {
    echo "post basket";
}
?>