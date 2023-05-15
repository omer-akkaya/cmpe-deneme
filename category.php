<?php
include_once "includes/database.php";
echo "category page"
    //code for return if no session will be here
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Category</title>
    <?php
    include "styles/category.css.php";
    include "js/category.js.php";
    ?>
</head>

<body>
    <!-- Header starts -->
    <?php include "includes/header.php";
    include "styles/header.css.php";
    include "js/header.js.php"; ?>
    <!-- Header ends -->

    <!-- Main banner starts -->
    <img id="main-banner" src="public/hero.jpg" />
    <!-- Main banner ends -->

    <!-- Main section starts-->
    <section class="main-section">
        <div class="main-section--title">
            <span id="category-name"></span>
            <span id="count"></span>
        </div>
        <div id="sort-by">
            <select name="sort_by" id="sort_by">
                <option value="highest_first">Price: Highest First</option>
                <option value="lowest_first">Price: Lowest First</option>
            </select>
        </div>
    </section>
    <!-- Main section ends-->


    <!-- Products starts-->
    <section id="products"></section>
    <!-- Products ends-->


    <!-- footer section starts-->
    <?php
    include "includes/footer.php";
    include "styles/footer.css.php";
    ?>
    <!-- footer section ends-->

</body>

</html>