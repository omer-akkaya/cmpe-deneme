<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
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

    $("document").ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("category_id");

        $.ajax({
            url: `api/category.php?category_id=${id}`,
            type: "get",
            success: function (response) {
                if (response.code == 200) {
                    const categoryName = response.data[0].name
                    $("#category-name").append(categoryName)
                } else {
                    console.log(response.message);
                }
            }
        })

        function getProducts(selection) {
            $.ajax({
                url: `api/product.php?category_id=${id}&sort_by=${selection}`,
                type: "get",
                success: function (response) {
                    if (response.code == 200) {
                        const count = response.count
                        const data = response.data
                        $("#count").empty()
                        $("#products").empty()
                        $("#count").append(count + " products found")
                        response.data.forEach(product => {
                            $("#products").append(`
                    <div id="container">
                        <div onClick="redirectProduct(id)" id = ${product.id} class= "bestseller__item" > 
                           <img class="bestseller__item__image" src=${product.photo}>
                            <div id="product_name">${product.name}</div>
                            <div class="bestseller__item__price">${product.price} ₺</div>
                        </div>
                        <div class="add_to_basket" id = ${product.id + "add"} onmousedown="mouseDown(id)" onmouseup="mouseUp(id)">Add to basket</div>
                    </div >
                `)
                        });
                    } else {
                        console.log(response.message);
                    }
                }
            })
        }

        getProducts("highest_first");

        function onChangeHandler(event) {
            const selection = $("#sort_by").val();
            if (selection == "highest_first") {
                getProducts("highest_first");
            }
            if (selection == "lowest_first") {
                getProducts("lowest_first");
            }

        }

        $("#sort_by").change(onChangeHandler)


    })
</script>