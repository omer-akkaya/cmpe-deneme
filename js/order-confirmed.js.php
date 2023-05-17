<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>;
<script>
    $("document").ready(function () {
        $("#go-to-home").click(function () {
            window.location.assign("index.php")
        })

        $("#go-to-previous-orders").click(function () {
            window.location.assign("previous-orders.php")
        })
    })
</script>