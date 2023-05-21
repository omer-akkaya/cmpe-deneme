<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];
$user_id = $_SESSION["id"];

if ($req_method == "POST" && isset($_POST["action"]) && $_POST["action"] == "confirm_order") {
    $payment_type = $_POST["payment_type"];
    $total_price = $_POST["total_price"];
    $adress = $_POST["adress"];

    $sql = "
    INSERT INTO orders (user_id,payment_type,total_price, adress)  
    VALUES ('$user_id', '$payment_type', '$total_price', '$adress')
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
    exit;
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "get_orders") {
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

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "admin_summary") {
    // RETURN TOTAL ORDER NUMBER, TOTAL REVENUE, AVERAGE ORDER AMOUNT
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($conn, $sql);
    $order_count = mysqli_num_rows($result);
    $sql = "SELECT sum(total_price) FROM orders";
    $result = mysqli_query($conn, $sql);
    $total_revenue;
    while ($row = mysqli_fetch_assoc($result)) {
        $total_revenue = $row["sum(total_price)"];
    }
    $average_order_amount = round($total_revenue / $order_count, 2);
    header("Content-type: Application/json");
    echo json_encode(["code" => 200, "order_count" => $order_count, "total_revenue" => $total_revenue, "average_order_amount" => $average_order_amount]);
}

if ($req_method == "GET" && isset($_GET["action"]) && $_GET["action"] == "admin_get_all_orders") {
    // RETURN ALL ORDERS
    $sql = "SELECT * FROM orders";
    $result = mysqli_query($conn, $sql);
    $all_orders = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $all_orders[] = $row;
    }
    header("Content-type: Application/json");
    echo json_encode(["code" => 200, "all_orders" => $all_orders]);
}
?>