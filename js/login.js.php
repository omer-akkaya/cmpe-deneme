<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $("document").ready(function () {
        $("#button").click(function (event) {
            console.log("preventdefault");
            event.preventDefault();
            const data = {
                name: $("#name").val(),
                email: $("#email").val(),
                password: $("#password").val(),
                action: $("#action").val()
            };

            $.ajax({
                url: "api/user.php",
                type: "post",
                data: data,
                success: (response) => {
                    console.log(data);
                    console.log(response);
                    if (response == "Login successful") {
                        window.location.replace("index.php")
                    }
                },

            }
            )
        })
    })

</script>