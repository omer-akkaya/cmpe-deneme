<?php
require_once "../includes/database.php";

//check if request is a GET request. if it is, get user as json.
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_SESSION["id"]) {
        $id = $_SESSION["id"];
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id = $id"));
        //inform client in the header that we send json data
        header("Content-type: application/json");
        //send data
        echo json_encode($user);
    } else {
        exit;
    }
}

//check if request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if post action is register
    if ($_POST["action"] == "register") {
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
    //check if post action is login
    if ($_POST["action"] == "login") {
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
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            echo "Login successful";
        }
    }
    //check if post action is logout
    if ($_POST["action"] == "logout") {
        // remove all session variables and destroy the session 
        session_unset();
        session_destroy();
        //inform client session destoryed successfully
        echo "success";
    }

}


if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    echo "put mode";
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "delete mode";
}


?>