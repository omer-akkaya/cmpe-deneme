<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("id")

        $.ajax({
            url: `api/product.php?id=${id}`,
            type: "get",
            success: function (response) {
                // Assign incoming information to suitable variables.
                const name = response.data[0].name
                const price = response.data[0].price
                const description = response.data[0].description
                const photo = response.data[0].photo

                $("#image").attr("src", photo)
                $("#title").html(name)
                $("#price").html(price)
                $("#description").html(description)
            }
        })
    })
</script>