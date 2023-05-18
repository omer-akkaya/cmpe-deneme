<?php
include_once "includes/database.php";

if (!$_SESSION["id"]) {
    exit;
}
?>


<!DOCTYPE html>

<head>
    <title>My Basket</title>
    <?php
    include "styles/basket.css.php";
    include "js/basket.js.php";
    include "styles/header.css.php";
    include "js/header.js.php";
    ?>
</head>

<body>

    <!-- Header starts -->
    <?php include "includes/header.php"; ?>

    <!-- Header ends -->
    <main class="main">
        <section>
            <div id="item-count"></div>
            <div id="products"></div>
        </section>
        <section id="basket-summary">
            <div id="order-summary">Order Summary</div>
            <div id="includes"></div>
            <div id="total-price"></div>
            <select id="select">
                <option value="card">Payment: Card</option>
                <option value="cash">Payment: Cash</option>
            </select>
            <div id="confirm-order">
                Confirm order <i class="fa-solid fa-angle-right"></i></i>
            </div>
        </section>
    </main>

    <!-- footer section starts-->
    <?php
    include "includes/footer.php";
    include "styles/footer.css.php";
    ?>
    <!-- footer section ends-->

</body>

</html>