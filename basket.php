<?php
include_once "includes/database.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>


<!DOCTYPE html>

<head>
    <title>Basket</title>
    <?php
    include "styles/header.css.php";
    include "styles/basket.css.php";
    include "styles/footer.css.php";
    include "js/header.js.php";
    include "js/basket.js.php";
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
            <select id="adress">
            </select>
            <select id="select">
                <option value="Credit Card">Payment: Credit Card</option>
                <option value="Cash">Payment: Cash</option>
            </select>
            <div id="confirm-order">
                Confirm order <i class="fa-solid fa-angle-right"></i></i>
            </div>
            <div id="add-adress">
                Please add an adress to proceed <i class="fa-solid fa-angle-right"></i></i>
            </div>
        </section>
    </main>

    <!-- footer section starts-->
    <?php
    include "includes/footer.php";

    ?>
    <!-- footer section ends-->

</body>

</html>