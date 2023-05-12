<?php
require_once "../includes/database.php";

// Check if request is a GET request.
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

// Check if request is POST and if post action is register
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "register") {
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

// Check if request is a POST request and if post action is login
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "login") {
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

// Check if request is a POST request and if post action is logout
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "logout") {
    // remove all session variables and destroy the session 
    session_unset();
    session_destroy();
    //inform client session destoryed successfully
    echo "success";
}

// Check if request is a POST request and POST action is update-profile
if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "update-profile") {
    // For using $conn variable defined outside of this scope 
    global $conn;
    // Get name, email and password from posted data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // If incoming id is not matches session id, stop script execution.
    if ($_SESSION["id"] != $id) {
        // If ids not matched, stop script execution.
        header("Content-type: Application-json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
        exit();
    }

    // Check if email or password or name is empty, if it is send error message and stop execution.
    if (empty($name) or empty($email) or empty($password)) {
        header("Content-type: Application-json");
        echo json_encode(["code" => 400, "message" => "You cant submit an empty form!"]);
        exit();
    }

    try {
        // Try updating row with incoming values.
        $query = "UPDATE customer SET email='$email', name='$name', password='$password' WHERE id='$id'";
        mysqli_query($conn, $query);
        header("Content-type: Application-json");
        echo json_encode(["code" => 200, "message" => "Successfully updated user"]);
    } catch (\Throwable $th) {
        // If database throws an error, catch it and send an error object to client.
        header("Content-type: Application-json");
        echo json_encode(["code" => 400, "message" => "An error occured!"]);
        exit();
    }
}

//check if request method is DELETE
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    echo "delete mode";
}

?>