<script defer>
    function redirectCategory(id) {
        window.location.assign(`category.php?category_id=${id}`)
    }

    function redirectProduct(id) {
        window.location.assign(`product.php?product_id=${id}`)
    }

    function mouseDown(id) {
        $(`#${id}`).css("background-color", "#15803D")
        $(`#${id}`).html("Item added to basket!")
    }

    function mouseUp(id) {
        function fn() {
            $(`#${id}`).css("background-color", "#14532D")
            $(`#${id}`).html("Add to basket")
        };
        setTimeout(fn, 800);
    }

    //wait for document load
    $("document").ready(function () {

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
                    response.forEach(({ id, name, price, photo }) => {
                        $(".bestseller__items").append(`
                    <div style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                        <div onClick="redirectProduct(id)" id = ${id} class= "bestseller__item" > 
                           <img class="bestseller__item__image" src=${photo}>
                            <div id="product_name">${name}</div>
                            <div class="bestseller__item__price">${price} ₺</div>
                        </div>
                        <div class="add_to_basket" id = ${id + "add"} onmousedown="mouseDown(id)" onmouseup="mouseUp(id)">Add to basket</div>
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