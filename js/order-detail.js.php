<script>
    function append_products(id) {
        $.ajax({
            url: `api/order.php?action=get_order_details&order_id=${id}`,
            success: function (response) {
                console.log(response);
                $("#products").empty()
                response.data.forEach(row => {
                    $("#products").append(`
                    <div class="product">
                        <div class="product-name">${row.product_name}</div>
                        <div class="product-price">${row.product_price} x ${row.count} pieces</div>
                        <div class="row-total">${row.total_price} ₺</div>
                    </div>
                    `)
                });
            }
        })
    }

    function append_order_info(id) {
        $.ajax({
            url: `api/order.php?action=get_single_order&order_id=${id}`,
            success: function (response) {
                response = response.data[0]
                $("#date").append(`<div>Time:</div><div>${response.timestamp}</div>`)
                $("#payment").append(`<div>Payment:</div><div>${response.payment_type}</div>`)
                $("#adress").append(`<div>Delivered to</div><div>${response.adress}</div>`)
                $("#total-price").append(`<div>Total price</div><span id="price">${response.total_price} ₺</span>`)
            }
        })
    }

    $("document").ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("order_id")
        append_products(id)
        append_order_info(id)
    })
</script>