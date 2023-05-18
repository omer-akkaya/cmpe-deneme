<?php
require_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit();
}

if ($req_method == "POST" && isset($_POST["action"]) && $_POST["action"] == "confirm_order") {
    global $user_id;
    $payment_type = $_POST["payment_type"];
    $total_price = $_POST["total_price"];

    $sql = "
    INSERT INTO orders (user_id,payment_type,total_price)  
    VALUES ('$user_id', '$payment_type', '$total_price')
    ";

    mysqli_query($conn, $sql);
    $order_id = mysqli_insert_id($conn);

    $sql = "
    SELECT products.id, products.name, products.price, basket.count  
    FROM basket 
    LEFT JOIN products 
    ON basket.product_id = products.id
    WHERE user_id = '$user_id'
    ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $row["total"] = number_format((float) $row["price"] * $row["count"], 2, '.', '');
        $product_id = $row["id"];
        $product_name = $row["name"];
        $product_price = $row["price"];
        $count = $row["count"];
        $total_price = $row["total"];
        $sql = "
        INSERT INTO order_details (user_id, order_id,product_id,product_name,product_price,count,total_price) 
        VALUES ('$user_id', '$order_id', '$product_id', '$product_name', '$product_price', '$count', '$total_price') 
        ";
        mysqli_query($conn, $sql);
    }

    $sql = "
    DELETE 
    FROM basket 
    WHERE user_id = '$user_id'
    ";
    mysqli_query($conn, $sql);
    echo json_encode(["code" => 200, "message" => "success"]);
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_orders") {
    global $user_id;
    $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: Application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_single_order" && isset($_GET["order_id"])) {
    global $user_id;
    $order_id = $_GET["order_id"];
    $sql = "SELECT * FROM orders WHERE user_id = '$user_id' AND id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: Application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_order_details" && isset($_GET["order_id"])) {
    global $user_id;
    $order_id = $_GET["order_id"];
    $sql = "SELECT * FROM order_details WHERE user_id = '$user_id' AND order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: Application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}
?>