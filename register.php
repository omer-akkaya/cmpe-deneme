<?php
// -------------------------------------------------------- COMPLETED
include_once "includes/database.php";
// if session exist (user signed in), redirect to index page
if (isset($_SESSION["id"])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<!-- head starts-->

<head>
    <title>Register</title>
    <?php
    require "js/register.js.php";
    require "styles/register.css.php";
    ?>
</head>
<!-- head ends-->


<body>

    <!-- header starts-->
    <header>
        <div class="header-flex">
            <div>iMed Logo</div>
        </div>
        </div>
    </header>
    <!-- header ends-->

    <!-- form starts-->
    <main>
        <h2>Register</h1>
            <form action="" method="post" autocomplete="off">
                <input type="hidden" id="action" value="register">
                <label for="">Name</label>
                <input type="text" name="" id="name">
                <label for="">Email</label>
                <input type="email" id="email">
                <label for="">Password</label>
                <input type="password" name="" id="password">
                <button id="button1">Register</button>
                <button id="button2">Go to login</button>
            </form>
    </main>
    <!-- form ends-->


    <!-- footer section starts-->
    <?php include "includes/footer.php" ?>
    <!-- footer section ends-->
</body>

</html>