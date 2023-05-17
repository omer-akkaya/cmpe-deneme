<?php
include_once "includes/database.php";
echo "order confirmed"
    //code for return if no session will be here
    ?>


<!DOCTYPE html>

<head>
    <title>Order Confirmed</title>
    <?php include "styles/order-confirmed.css.php";
    include "js/order-confirmed.js.php" ?>
</head>

<body>
    <?php include "includes/header.php";
    include "styles/header.css.php";
    include "js/header.js.php" ?>
    <main>
        <i class="fa-solid fa-clipboard-check"></i>
        <div id="message">Your order processed successfully.</div>
        <div id="go-to-home">Go to home page</div>
        <div id="go-to-previous-orders">Display previous orders</div>
    </main>
    <?php include "includes/footer.php";
    include "styles/footer.css.php"; ?>
</body>

</html>