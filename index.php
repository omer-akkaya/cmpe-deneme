<?php
//start the session
session_start();
//connect to the database
$conn = mysqli_connect("localhost", "root", "", "cmpe-deneme");
if (isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM customer WHERE id = $id"));
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Index</title>
</head>

<body>
    <h1>Welcome
        <?php echo $user["name"]; ?>
    </h1>
    <a href="logout.php">Logout</a>
    <button id="button">click me</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $("#button").click(function (event) {
            event.preventDefault();
            $.ajax({
                url: "api/user.php",
                type: "get",
                success: function (response) {
                    console.log(response);
                }

            })
        })
    </script>
</body>

</html>