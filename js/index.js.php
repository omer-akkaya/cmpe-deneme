<script src="https://kit.fontawesome.com/a868116e0a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function redirectCategory(id) {
        window.location.assign(`category.php?id=${id}`)
    }

    function redirectProduct(id) {
        window.location.assign(`product.php?id=${id}`)
    }

    //wait for document load
    $("document").ready(function () {
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
        //get categories
        $.ajax({
            url: "api/category.php",
            type: "get",
            success: (response) => {
                response.forEach(({ id, name }) => {
                    $(".categories__items").append(`<div onClick="redirectCategory(id)" id = ${id} class= "categories__item" > ${name}</div >`)

                });
            }
        })

        $.ajax({
            url: "api/product.php?featured=true",
            type: "get",
            success: (response) => {
                response.forEach(({ id, name, price }) => {
                    $(".bestseller__items").append(`<div onClick="redirectProduct(id)" id = ${id} class= "bestseller__item" > 
                    <div class="bestseller__item__image">product image</div>
                    <div>${name}</div>
                    <div style="color:green;font-weight:800;">${price} TL</div>
                    </div >`)
                });
            }
        })


        //get account information
        $.ajax({
            url: "api/user.php",
            type: "get",
            success: ({ id, name, email }) => {
                $(".btn--user").append(email)
            }
        })

    })
</script>