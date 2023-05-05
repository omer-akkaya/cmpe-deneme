<?php
// include database connection and session
include_once "includes/database.php";
// redirect user to login page if session does not exists
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>

<head>
    <title>iMed: Online Medical Shopping</title>
    <!-- favicon gelecek buraya-->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        body {
            /* for desktop only */
            min-width: 1500px;
        }

        header {
            background-color: black;
            height: 80px;
        }

        .header-flex {
            height: 100%;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1280px;
            margin-left: auto;
            margin-right: auto;
            font-size: 20px;
        }

        .header-flex__right {
            display: flex;
            gap: 30px;
        }

        .hero {
            background-color: #bd5734;
            padding-top: 30%;
            width: 100%;
            margin: auto;
            position: relative;
        }

        .hero__text {
            color: white;
            position: absolute;
            width: 100%;
            top: 40px;
            left: 0px;
            text-align: center;
        }

        .btn {
            background-color: #000080;
            padding: 15px;
            border-radius: 30px;
            cursor: pointer;
        }

        .btn--logout {
            background-color: red;
        }

        .btn--basket {
            background-color: blue;
        }

        .btn--user {
            background-color: grey;
        }
    </style>
</head>

<body>
    <!-- header starts-->
    <header>
        <div class="header-flex">
            <div>iMed Logo</div>
            <div class="header-flex__right">
                <div class="btn btn--logout">Log Out</div>
                <div class="btn btn--basket">Basket (0)</div>
                <div class="btn btn--user">Username</div>
            </div>
        </div>
    </header>
    <!-- header ends-->

    <!-- hero section starts-->
    <div class="hero">
        <div class="hero__text">Öykü will design hero banner</div>
    </div>
    <!-- hero sectionends-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $("document").ready(function () {
            $(".btn--logout").click(function () {
                $.ajax({
                    url: "api/user.php",
                    type: "post",
                    data: { action: "logout" },
                    success: (response) => {
                        if (response == "success") {
                            window.location.replace("login.php")
                        }
                    }
                }
                )
            })
        })
    </script>
</body>

</html>