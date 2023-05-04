<?php
//Start the session
session_start();
//Connect to the database
$conn = mysqli_connect("localhost", "root", "", "cmpe-deneme");


if (isset($_POST["action"])) {
    if ($_POST["action"] == "register") {
        register();
    }
    if ($_POST["action"] == "login") {
        login();
    }
}

function register()
{
    global $conn;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill out the form";
        exit();
    }

    $user = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        echo "Username has already taken...";
        exit();
    }

    $query = "INSERT INTO customer VALUES ('','$name','$email','$password')";
    mysqli_query($conn, $query);
    echo "Registiration is successful";
}
;

function login()
{
    global $conn;
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
        echo "Login successful";
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
    }
}
;

?>