<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    //wait for document loading to finish
    $(document).ready(function () {
        //assign onclick function to button1
        $("#button1").click(function (event) {
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
                    if (response == "Registiration is successful") {
                        window.location.replace("login.php")
                    } else {
                        alert(response)
                    }
                },

            }
            )
        })
        //assign onclick function to button2
        $("#button2").click(function (event) {
            event.preventDefault()
            window.location.assign("login.php")
        })
    })

</script>