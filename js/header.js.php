<script src="https://kit.fontawesome.com/a868116e0a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    function assign_row_count(row_count) {
        $(".btn--basket").empty()
        $(".btn--basket").append(`
        <i class="fa-solid fa-basket-shopping"></i>
        Basket (${row_count})
        `)
    }

    $("document").ready(function () {
        //get account information
        $.ajax({
            url: "api/user.php",
            type: "get",
            success: ({ id, name, email }) => {
                $(".btn--user").append(email)
            }
        })

        $.ajax({
            url: "api/basket.php?action=get_num_rows",
            type: "get",
            success: function (response) {
                console.log(response.row_count);
                $(".btn--basket").empty()
                $(".btn--basket").append(`
                 <i class="fa-solid fa-basket-shopping"></i>
                Basket (${response.row_count})
                `)
            }
        })

        $(".btn--basket").click(function () {
            window.location.assign(`basket.php`)
        })

        $(".btn--user").click(function () {
            window.location.assign(`profile.php`)
        })

        $("#logo").click(function () {
            window.location.assign(`index.php`)
        })

        //add logout functionality to logout button
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