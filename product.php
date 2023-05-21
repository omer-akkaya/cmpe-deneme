<?php
include_once "includes/database.php";
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<head>
    <title>Product Page</title>
    <?php
    include "js/product.js.php";
    include "styles/product.css.php";
    ?>
</head>

<body>
    <!-- Header starts -->
    <?php include "includes/header.php";
    include "styles/header.css.php";
    include "js/header.js.php"; ?>
    <!-- Header ends -->

    <!--Main section starts-->
    <div class="main">
        <img id="image" />
        <div class="main-information">
            <div id="title"></div>
            <div id="price"></div>
            <div id="add-to-basket">Add to basket</div>
            <div id="description"></div>
        </div>
    </div>
    <!--Main section ends-->

    <?php include "includes/footer.php";
    include "styles/footer.css.php"; ?>
</body>

</html>