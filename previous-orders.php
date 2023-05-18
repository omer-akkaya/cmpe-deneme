<?php
include_once "includes/database.php";
//code for return if no session will be here
?>

<!DOCTYPE html>

<head>
    <title>Previous Orders</title>
    <?php
    include "styles/header.css.php";
    include "js/header.js.php";
    include "styles/previous-orders.css.php";
    include "js/previous-orders.js.php";
    include "styles/footer.css.php";
    ?>
</head>

<body>
    <?php include "includes/header.php"; ?>

    <main>
        <div id="title">Your Previous Orders</div>
        <div id="previous-orders"></div>
    </main>

    <?php include "includes/footer.php"; ?>
</body>

</html>