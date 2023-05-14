<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        const params = (new URL(document.location)).searchParams;
        const id = params.get("id")

        $.ajax({
            url: `api/product.php?category_id=${id}`,
            type: "get",
            success: (response) => {
                console.log(response)
            }
        })
    })
</script>