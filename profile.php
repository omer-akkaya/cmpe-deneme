<?php
include_once "includes/database.php";
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<head>
    <title>Profile</title>
    <?php
    include "styles/header.css.php";
    include "js/header.js.php";
    include "js/profile.js.php";
    include "styles/profile.css.php";
    ?>
</head>

<body>
    <!-- Header starts -->
    <?php include "includes/header.php"; ?>
    <!-- Header ends -->

    <!-- Title starts -->
    <h1 class="title">My Profile</h1>
    <!-- Title ends -->

    <!-- Form starts -->
    <form action="" method="post" autocomplete="off">
        <input type="hidden" id="action" value="update-profile">
        <input type="hidden" id="id" value="">
        <label>Name</label>
        <input type="text" name="" id="name">
        <label>Email</label>
        <input type="email" id="email">
        <label>Password</label>
        <input type="password" name="" id="password">
        <label>Adress</label>
        <textarea name="adress" id="adress" cols="30" rows="10"></textarea>
        <button id="button2">Update my information</button>
        <div id="success-message" class="hidden">Successfully updated!</div>
        <div id="error-message" class="hidden">An error occured...</div>
    </form>
    <!-- Form ends -->


</body>

</html>