<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/header.css.php" ?>
    <?php include "js/header.js.php" ?>
    <?php include "css/add-product.css.php" ?>
    <?php include "js/add-product.js.php" ?>
    <title>Add Product</title>
</head>

<body>
    <?php include "includes/header.php" ?>

    <!-- Title starts -->
    <div class="title">Add Product</div>
    <!-- Title ends -->

    <!-- Form starts -->
    <form action="" method="post" autocomplete="off">
        <label>Product Name</label>
        <input type="text" name="" id="name">
        <label>Price</label>
        <input type="number" id="price">
        <label>Photo Url</label>
        <input type="text" min="0" step="1" id="photo_url">
        <label>Category</label>
        <select name="category" id="category"></select>
        <label>Description</label>
        <textarea name="adress" id="description" cols="30" rows="10"></textarea>
        <button id="button">Add Product</button>
    </form>
    <!-- Form ends -->

</body>

</html>