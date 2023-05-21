<?php
include_once "includes/database.php";
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>

<head>
    <title>Order Detail</title>
    <?php
    include "styles/header.css.php";
    include "styles/order-detail.css.php";
    include "styles/footer.css.php";
    include "js/header.js.php";
    include "js/order-detail.js.php";
    ?>
</head>

<body>
    <?php include "includes/header.php" ?>
    <section>
        <div id="title">Order Detail</div>
        <main class="main">
            <section>
                <div id="item-count">
                    <i class="fa-sharp fa-solid fa-basket-shopping"></i> Order Details
                </div>
                <div id="products"></div>
            </section>
            <section id="basket-summary">
                <div id="order-summary">Order Summary</div>
                <div id="date"></div>
                <div id="payment"></div>
                <div id="adress"></div>
                <div id="total-price"></div>
            </section>
        </main>
    </section>
    <?php include "includes/footer.php" ?>
</body>

</html>