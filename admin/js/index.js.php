<script>
    const redirectProduct = (id) => {
        window.location.assign(`edit-product.php?id=${id}`)
    }


    $("document").ready(() => {
        $.ajax({
            url: "../api/order.php?action=admin_summary",
            success: (response) => {
                $("#total-revenue").append(`${response.total_revenue} TL`)
                $("#order-count").append(response.order_count)
                $("#average-revenue").append(`${response.average_order_amount} TL`)
            }
        })

        $.ajax({
            url: "../api/product.php",
            success: (response) => {
                response.data.forEach(product => {
                    $("#products").append(`
                        <div id="container">
                            <div onClick="redirectProduct(id)" id = ${product.id} class= "bestseller__item" > 
                                <img class="bestseller__item__image" src="../${product.photo}">
                                <div id="product_name">${product.name}</div>
                                <div class="bestseller__item__price">${product.price} ₺</div>
                            </div>
                        </div >
                    `)
                });
            }
        })



    })
</script>