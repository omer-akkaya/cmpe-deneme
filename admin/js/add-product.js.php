<script>
    $("document").ready(() => {
        $.ajax({
            url: "../api/category.php",
            success: (response) => {
                response.data.forEach(category => {
                    $("select").append(`<option value="${category.id}">${category.name}</option>`)
                });
            }
        })

        $("#button").click((event) => {
            event.preventDefault()
            const action = "add_product"
            const name = $("#name").val()
            const price = $("#price").val()
            const photo = $("#photo_url").val()
            const category_id = $("#category").val()
            const description = $("#description").val()
            const new_product = { action, name, price, photo, category_id, description }
            $.ajax({
                url: "../api/product.php",
                type: "post",
                data: new_product,
                success: (response) => {
                    alert("Product successfully inserted to database, you will be redirected to index page.")
                    window.location.assign("index.php")
                }
            })
        })
    })
</script>