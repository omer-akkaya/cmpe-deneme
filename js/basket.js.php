<script>
    function delete_button_handler(event, id) {
        event.stopPropagation()
        $.ajax({
            url: `api/basket.php?action=delete_item&product_id=${id}`,
            success: function (response) {
                // Below function is coming from header.js.php
                assign_row_count()
                get_num_rows()
                append_products()
            }
        })
    }

    function get_num_rows() {
        $.ajax({
            url: "api/basket.php?action=get_num_rows",
            success: function (response) {
                $("#item-count").empty()
                $("#includes").empty()
                $("#item-count").append(`
                <i class="fa-sharp fa-solid fa-basket-shopping"></i> My basket (${response.row_count || "0"} items)
                `)
                $("#includes").append(`
                <div>Includes</div><div>${response.row_count || "0"} items</div> 
                `)
            }
        })
    }

    function product_click_handler(id) {
        window.location.assign(`product.php?product_id=${id}`)
    }

    function append_products() {
        $.ajax({
            url: "api/basket.php?action=get_basket",
            success: function (response) {
                $("#products").empty()
                let total_price = 0;
                response.data.forEach(row => {
                    total_price += +row.total;
                    $("#products").append(`
                    <div id=${row.product_id} onclick="product_click_handler(${row.product_id})" class="product">
                        <div class="product-name">${row.name}</div>
                        <div class="product-price">${row.price} x ${row.count} pieces</div>
                        <div class="row-total">${row.total} ₺</div>
                        <i onclick="delete_button_handler(event, ${row.product_id})" class="fa-solid fa-trash delete-button"></i>
                    </div>
                    `)
                });
                total_price = total_price.toFixed(2)
                $("#total-price").empty()
                $("#total-price").append(`<div>Total price</div><span id="price">${total_price} ₺</span>`)
            }
        })
    }

    function get_adress() {
        $.ajax({
            url: "api/user.php",
            success: function (response) {
                const adress = response.adress
                if (!adress || adress == "") {
                    console.log("true");
                    $("#adress").addClass("hidden")
                    $("#confirm-order").addClass("hidden")
                    $("#add-adress").click(() => { window.location.assign("profile.php") })
                }
                if (adress != "") {
                    $("#add-adress").addClass("hidden")
                    $("#adress").append(`<option value="${adress}">Deliver to: ${adress}</option>`)
                }
            }
        })
    }



    $(document).ready(function () {
        get_num_rows()
        append_products()
        get_adress()


        $("#confirm-order").click(function () {
            const totalPrice = +$("#price").text().slice(0, -2)
            if (totalPrice <= 0) {
                alert("You must order at least 1 product.");
                return;
            }
            const data = {
                action: "confirm_order",
                payment_type: $("#select").val(),
                adress: $("#adress").val(),
                total_price: totalPrice
            }

            $.ajax({
                url: "api/order.php",
                type: "post",
                data: data,
                success: function (response) {
                    window.location.assign("order-confirmed.php")
                }
            })
        })
    })
</script>