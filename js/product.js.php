<script>
    $(document).ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("product_id")

        $.ajax({
            url: `api/product.php?product_id=${id}`,
            success: function (response) {
                const name = response.data[0].name
                const price = response.data[0].price
                const description = response.data[0].description
                const photo = response.data[0].photo

                $("#image").attr("src", photo)
                $("#title").html(name)
                $("#price").html(price + " ₺")
                $("#description").html(description)

                $("#add-to-basket").click(function () {
                    $.ajax({
                        url: "api/basket.php",
                        type: "post",
                        data: { product_id: id },
                        success: function (response) {
                            assign_row_count(response.row_count);
                        }
                    })
                })
            }
        })
    })
</script>