<?php
// include database connection and session
include_once "includes/database.php";
// redirect user to login page if session does not exists
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<!-- head starts-->

<head>
    <title>eMed: Online Medical Shopping</title>
    <?php
    include "js/header.js.php";
    include "styles/header.css.php";
    include "styles/index.css.php";
    include "js/index.js.php";
    ?>
</head>
<!-- head ends-->


<!-- body starts-->

<body>
    <!-- header starts-->
    <?php include "includes/header.php" ?>
    <!-- header ends-->

    <!-- hero section starts-->
    <img id="hero" src="public/hero.jpg">
    <!-- hero section ends-->

    <!-- categories section starts-->
    <div class="categories">
        <div class="categories__title">Categories</div>
        <div class="categories__items"></div>
    </div>
    <!-- categories section ends-->

    <!-- best sellers section starts-->
    <div style="background-color: #f0efef;">
        <div class="bestseller">
            <div class="bestseller__title">Best Sellers</div>
            <div class="bestseller__items"></div>
        </div>
    </div>
    <!-- best sellers section ends-->

    <!-- cards section starts-->
    <div class="cards">
        <div class="cards__card">
            <i class="fa-solid fa-capsules" style="font-size: 50px;"></i>
            Reliable products
        </div>
        <div class=" cards__card">
            <i class="fa-solid fa-face-smile" style="font-size: 40px;"></i>
            Smooth shopping experince
        </div>
        <div class="cards__card">
            <i class="fa-solid fa-truck-fast" style="font-size: 40px;"></i>
            Same day delivery
        </div>
    </div>
    <!-- cards section ends-->

    <!-- footer section starts-->
    <?php include "includes/footer.php" ?>
    <!-- footer section ends-->
</body>
<!-- body ends-->

</html>