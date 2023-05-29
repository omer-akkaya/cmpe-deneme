<script>
    $("document").ready(() => {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("id")

        $.ajax({
            url: `../api/product.php?product_id=${id}`,
            type: "get",
            success: (response) => {
                $("#name").val(response.data[0].name)
                $("#description").val(response.data[0].description)
                $("#price").val(response.data[0].price)
                $("#photo_url").val(response.data[0].photo)
            }
        })


        $("#button").click((event) => {
            event.preventDefault()
            const new_product = {
                action: "update_product",
                id: id,
                name: $("#name").val(),
                description: $("#description").val(),
                price: $("#price").val(),
                photo: $("#photo_url").val()
            }

            $.ajax({
                url: "../api/product.php",
                type: "post",
                data: new_product,
                success: (response) => {
                    alert("Product successfully updated. You will be redirected to index page.")
                    window.location.assign("index.php")
                }
            })
        })

        $("#delete-button").click((event) => {
            event.preventDefault()
            $.ajax({
                url: "../api/product.php",
                type: "post",
                data: { action: "delete_product", id: id },
                success: (response) => {
                    alert("Product successfully deleted. You will be redirected to index page.")
                    window.location.assign("index.php")
                }
            })
        })


    })
</script>