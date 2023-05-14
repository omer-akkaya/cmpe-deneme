<?php
include_once "includes/database.php";
//code for return if no session will be here
?>


<!DOCTYPE html>

<head>
    <title>Category Page (Helin)</title>
    <?php
    include "styles/category.css.php";
    include "js/category.js.php";
    ?>
</head>

<body>
    <!-- header starts-->

    <?php
    include "includes/header.php";
    include "styles/header.css.php";
    include "js/header.js.php";
    ?>
    <!-- header ends-->

    <!-- hero banner starts -->
    <img src="public/hero.jpg">
    <!-- hero banner ends -->

    <div id="main">
        <div id="title">
            <div id="count">
                <!-- javascript will fill this space with number of items -->
            </div>
            <div id="order-by">
                <select name="order-by" id="order-by">
                    <option value="1">Highest price first</option>
                    <option value="1">Lowest price first</option>
                </select>
            </div>
        </div>
        <div id="products">
            <!-- javascript will fill this space according to incoming data from server -->
        </div>


</body>

</html>