<?php
include_once "../includes/database.php";

$req_method = $_SERVER["REQUEST_METHOD"];

if ($req_method == "GET" && $_SESSION["id"]) {
    $id = $_SESSION["id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id = $id"));
    header("Content-type: application/json");
    echo json_encode($user);
    exit;
}


if ($req_method == "POST" && $_POST["action"] == "register") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill out the form";
        exit;
    }
    $user = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        echo "Username has already taken...";
        exit;
    }
    $query = "INSERT INTO customer VALUES ('','$name','$email','$password')";
    mysqli_query($conn, $query);
    echo "Registiration is successful";
    exit;
}

if ($req_method == "POST" && $_POST["action"] == "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT * FROM customer WHERE email = '$email'";
    $user = mysqli_query($conn, $query);
    if (mysqli_num_rows($user) <= 0) {
        echo "No user found";
        exit;
    }
    $row = mysqli_fetch_assoc($user);
    if ($password != $row['password']) {
        echo "Wrong email or password!";
        exit;
    }
    if ($password == $row['password']) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        $_SESSION["is_admin"] = $row["is_admin"];
        echo "Login successful";
        exit;
    }
    exit;
}

if ($req_method == "POST" and $_POST["action"] == "update-profile") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adress = $_POST["adress"];

    if (empty($name) or empty($email) or empty($password)) {
        header("Content-type: Application-json");
        echo json_encode(["code" => 400, "message" => "You cant submit an empty form!"]);
        exit;
    }

    $query = "UPDATE customer SET email='$email', name='$name', password='$password', adress='$adress' WHERE id='$id'";
    mysqli_query($conn, $query);
    header("Content-type: Application-json");
    echo json_encode(["code" => 200, "message" => "Successfully updated user"]);
    exit;
}

if ($req_method == "POST" && $_POST["action"] == "logout") {
    session_unset();
    session_destroy();
    echo "success";
    exit;
}
?>