<?php
include_once "../includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}

$req_method = $_SERVER["REQUEST_METHOD"];

if ($req_method == "GET" && isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "GET" && isset($_GET["category_id"]) && isset($_GET["sort_by"])) {
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
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    $count = mysqli_num_rows($result);
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows, "count" => $count]);
    exit;
}

if ($req_method == "GET") {
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => $rows]);
    exit;
}

if ($req_method == "POST" && $_POST["action"] == "add_product") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];
    $category_id = $_POST["category_id"];
    $description = $_POST["description"];

    $sql = "INSERT INTO products(name,price,photo,category_id,description) VALUES ('$name','$price','$photo','$category_id','$description')";
    mysqli_query($conn, $sql);

    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => "success"]);
    exit;
}

if ($req_method == "POST" && $_POST["action"] == "update_product") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];

    $sql = "UPDATE products SET name='$name', price='$price', photo='$photo', description='$description' WHERE id='$id'";
    mysqli_query($conn, $sql);

    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => "success"]);
    exit;
}

if ($req_method == "POST" && $_POST["action"] == "delete_product") {
    $id = $_POST["id"];

    $sql = "DELETE FROM basket WHERE product_id='$id'";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM products WHERE id='$id'";
    mysqli_query($conn, $sql);

    header("Content-type: application/json");
    echo json_encode(["code" => 200, "data" => "success"]);
    exit;
}
?>