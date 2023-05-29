<!DOCTYPE html>

<head>
    <title>Admin</title>
    <?php include "css/header.css.php" ?>
    <?php include "js/header.js.php" ?>
    <?php include "css/index.css.php" ?>
    <?php include "js/index.js.php" ?>
</head>

<body>
    <?php include "includes/header.php" ?>
    <main>
        <div id="summary-title">Summary</div>
        <section class="info">
            <div class="info-box">
                <div>Total Revenue</div>
                <span id="total-revenue"></span>
            </div>
            <div class="info-box">
                <div>Total Order Count</div>
                <span id="order-count"></span>
            </div>
            <div class="info-box">
                <div>Average Order Amount</div>
                <span id="average-revenue"></span>
            </div>
        </section>
        <div id="products-title">Products on sale</div>
        <section id="products"></section>
    </main>
</body>

</html>