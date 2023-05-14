<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("id");

        $.ajax({
            url: "api/product.php?category_id=" + id,
            type: "get",
            success: function (data) {
                $("#count").append(data.length + " products found")

                data.forEach(function (item) {
                    $("#products").append(`
                        <div class="product">${item.name} ----- ${item.price} USD</div >
                    `)
                }
                );
            }
        })
    })
</script>