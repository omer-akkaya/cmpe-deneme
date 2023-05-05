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
    <?php include "styles/index.css.php";
    include "js/index.js.php" ?>
</head>
<!-- head ends-->
<!-- body starts-->

<body>
    <!-- header starts-->
    <header>
        <div class="header-flex">
            <div>eMed Logo</div>
            <div class="header-flex__right">
                <div class="btn btn--basket">
                    <i class="fa-solid fa-basket-shopping"></i>
                    Basket (0)
                </div>
                <div class="btn btn--user">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="btn btn--logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Log Out
                </div>
            </div>
        </div>
    </header>
    <!-- header ends-->

    <!-- hero section starts-->
    <div class="hero">
        <div class="hero__text">hero banner design<br>kategori resimleri eklencek<br>eray ürün fotoğrafları<br>favicon
            design<br>
        </div>
    </div>
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