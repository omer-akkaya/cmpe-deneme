<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/header.css.php" ?>
    <?php include "js/header.js.php" ?>
    <?php include "css/edit-product.css.php" ?>
    <?php include "js/edit-product.js.php" ?>
    <title>Add Product</title>
</head>

<body>
    <?php include "includes/header.php" ?>

    <!-- Title starts -->
    <div class="title">Edit Product</div>
    <!-- Title ends -->

    <!-- Form starts -->
    <form action="" method="post" autocomplete="off">
        <label>Product Name</label>
        <input type="text" name="" id="name">
        <label>Price</label>
        <input type="number" id="price">
        <label>Photo Url</label>
        <input type="text" min="0" step="1" id="photo_url">
        <label>Description</label>
        <textarea name="adress" id="description" cols="30" rows="10"></textarea>
        <button id="delete-button">Delete Product</button>
        <button id="button">Edit Product</button>
    </form>
    <!-- Form ends -->

</body>

</html>