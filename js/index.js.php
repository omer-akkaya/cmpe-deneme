<script defer>
    let redirectProduct;
    let mouseDown;
    let mouseUp;

    function redirectCategory(id) {
        window.location.assign(`category.php?category_id=${id}`)
    }

    //wait for document load
    $("document").ready(function () {
        redirectProduct = function (id) {
            window.location.assign(`product.php?product_id=${id}`)

        }

        mouseDown = function (id) {
            // Logic for adding to basket
            $.ajax({
                url: "api/basket.php",
                type: "post",
                data: { product_id: id },
                success: function (response) {
                    assign_row_count(response.row_count);
                }
            })
            // Logic for changing button style
            $(`.${id}add`).css("background-color", "#15803D")
            $(`.${id}add`).html("Item added to basket!")
            function fn() {
                $(`.${id}add`).css("background-color", "#14532D")
                $(`.${id}add`).html("Add to basket")
            };
            setTimeout(fn, 800);
        }

        //get categories and render
        $.ajax({
            url: "api/category.php",
            type: "get",
            success: (response) => {
                if (response.code == 200) {
                    response.data.forEach((category) => {
                        const id = category.id;
                        const name = category.name;
                        $(".categories__items").append(`
                    <div onClick="redirectCategory(id)" id = ${id} class= "categories__item" > 
                        <img src="public/majezik.png">
                        <div>${name}<div/>
                    </div >
                    `)
                    });
                } else {
                    console.log(response.message)
                }

            }
        })

        //get products and render
        $.ajax({
            url: "api/product.php",
            type: "get",
            success: (response) => {
                if (response.code == 200) {
                    response = response.data.slice(0, 4)
                    response.forEach((product) => {
                        $(".bestseller__items").append(`
                    <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div onClick="redirectProduct(id)" id = ${product.id} class= "bestseller__item" > 
                           <img class="bestseller__item__image" src=${product.photo}>
                            <div id="product_name">${product.name}</div>
                            <div class="bestseller__item__price">${product.price} ₺</div>
                        </div>
                        <div class="add_to_basket ${product.id + "add"}" onmousedown=mouseDown(${product.id})>Add to basket</div>
                    </div >
                `)
                    });
                } else {
                    console.log(data.message)
                }
            }
        })
    })
</script>