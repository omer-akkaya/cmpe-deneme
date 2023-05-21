<script src="https://kit.fontawesome.com/a868116e0a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        $("document").ready(function () {
            $(".btn--user").click(function () {
                window.location.assign(`profile.php`);
            });

            $("#logo").click(function () {
                window.location.assign(`index.php`);
            });

            //add logout functionality to logout button
            $(".btn--logout").click(function () {
                $.ajax({
                    url: "../api/user.php",
                    type: "post",
                    data: { action: "logout" },
                    success: (response) => {
                        if (response == "success") {
                            window.location.replace("../login.php");
                        }
                    },
                });
            });

            $(".btn--add-product").click(function () {
                window.location.replace("./add-product.php");
            });
        });

    })
</script>