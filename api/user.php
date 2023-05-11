<?php
require_once "../includes/database.php";

//check if request is a GET request.
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //check if id exists on session
    if ($_SESSION["id"]) {
        //assign $sessionid to $id variable for ease of use 
        $id = $_SESSION["id"];
        //get user from the database which is id = session id
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id = $id"));
        //inform client in the header that we send json data
        header("Content-type: application/json");
        //send user data as json
        echo json_encode($user);
    } else {
        //if id is not set on session stop execution
        exit;
    }
}

//check if request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //check if post action is register
    if ($_POST["action"] == "register") {
        //for using $conn variable defined outside of this scope 
        global $conn;
        //get name, email and password from posted data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        //check if email or password or name is empty, if it is send error message and stop execution.
        if (empty($name) || empty($email) || empty($password)) {
            echo "Please fill out the form";
            exit();
        }
        //check if email is used by another user on database, if it is; send error message and stop execution.
        $user = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
        if (mysqli_num_rows($user) > 0) {
            echo "Username has already taken...";
            exit();
        }
        //if there is no error, insert new user to database
        $query = "INSERT INTO customer VALUES ('','$name','$email','$password')";
        mysqli_query($conn, $query);
        //send success message
        echo "Registiration is successful";
    }
    //check if post action is login
    if ($_POST["action"] == "login") {
        //for using $conn variable defined outside of this scope 
        global $conn;
        //get entered email and password from posted data
        $email = $_POST["email"];
        $password = $_POST["password"];
        //get record from database which uses entered email 
        $query = "SELECT * FROM customer WHERE email = '$email'";
        $user = mysqli_query($conn, $query);
        //check if any record exists in database, if not stop execution
        if (mysqli_num_rows($user) <= 0) {
            echo "No user found";
            exit;
        }
        //get row which uses entered email
        $row = mysqli_fetch_assoc($user);

        //check if entered password equals password from database record. if not, send error message and stop execution.
        if ($password != $row['password']) {
            echo "Wrong email or password!";
            exit;
        }
        //if there is no problem set login and id on session. send success message. 
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

//check if request method is PUT
if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "update-profile") {
    //for using $conn variable defined outside of this scope 
    global $conn;
    //get name, email and password from posted data
    $id = $_POST["id"]; //28
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //check if email or password or name is empty, if it is send error message and stop execution.
    if (empty($name) or empty($email) or empty($password)) {
        echo "Please fill out the form";
        exit();
    }
    //check if email is used by another user on database, if it is; send error message and stop execution.
    $user = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        echo "Email has already taken...";
        exit();
    }

    // I am trying to solve email has already taken problem by comparing database and incoming value. If value changed, make UPDATE on database. If not,
    // leave it as it is.

    // // If there is no error, UPDATE record on database
    // $query = "UPDATE customers SET name='$name', email='$email', password='$password' WHERE id='$id'";
    // mysqli_query($conn, $query);
    // //send success message
    // echo "User information UPDATED successfully";
}

//check if request method is DELETE
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "delete mode";
}


?>