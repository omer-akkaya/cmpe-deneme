<?php
include_once "includes/database.php";
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>


<!DOCTYPE html>

<head>
    <title>Order Confirmed</title>
    <?php
    include "styles/header.css.php";
    include "js/header.js.php";
    include "styles/order-confirmed.css.php";
    include "js/order-confirmed.js.php";
    include "styles/footer.css.php";
    ?>
</head>

<body>
    <?php include "includes/header.php"; ?>
    <main>
        <i id="order-confirmed-icon" class="fa-solid fa-clipboard-check"></i>
        <div id="message">Your order processed successfully.</div>
        <div id="go-to-home">Go to home page</div>
        <div id="go-to-previous-orders">Display previous orders</div>
    </main>
    <?php include "includes/footer.php"; ?>
</body>

</html>