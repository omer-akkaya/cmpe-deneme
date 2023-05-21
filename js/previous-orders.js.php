<script>
    function clickHandler(id) {
        window.location.assign(`order-detail.php?order_id=${id}`)
    }


    $("document").ready(function () {
        $.ajax({
            url: "api/order.php?action=get_orders",
            success: function (response) {
                const data = response.data

                data.forEach(order => {
                    $("#previous-orders").append(`
                        <div onclick=clickHandler(${order.id}) class="previous-order">
                            <div class="order-info">
                                <div class="order-info-id"><a>Order ID:</a> ${order.id}</div>
                                <div class="order-info-date"><a>Order Date:</a> ${order.timestamp}</div>
                                <div class="order-info-payment"><a>Payment:</a> ${order.payment_type}</div>
                                <div class="order-info-payment"><a>Delivered to:</a> ${order.adress}</div>
                            </div>
                            <div class="order-total">
                                <div class="order-total-title">Order Total: </div>
                                <div class="order-total-price">${order.total_price} ₺</div>
                            </div>
                        </div>
                    `)
                });
            }
        })
    })
</script>