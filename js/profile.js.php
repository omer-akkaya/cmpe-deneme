<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // Wait document to be ready.
    $("document").ready(function () {
        // Send get request to server for getting all user information.
        $.ajax({
            url: "api/user.php",
            type: "get",
            success: function (data) {
                $("#name").val(data.name)
                $("#email").val(data.email)
                $("#password").val(data.password)
                $("#id").val(data.id)
                $("#adress").val(data.adress)
            }
        })

        // Add on-click function to form submit button. 
        $("button").click(function (event) {
            // Prevent default behaviour of form submit.
            event.preventDefault();
            // Get id, name, email, password and action values from the form. 
            const action = $("#action").val()
            const id = $("#id").val()
            const name = $("#name").val()
            const email = $("#email").val()
            const password = $("#password").val()
            const adress = $("#adress").val()
            const adress_title = $("#adress_title").val()
            // Create a JS object to send theese values to server.
            const user = { id, name, email, password, action, adress, adress_title }
            // Make an AJAX call to POST new values to server. 
            $.ajax({
                url: "api/user.php",
                type: "post",
                data: user,
                success: function (data) {
                    if (data.code == 200) {
                        $("#success-message").addClass("hidden");
                        $("#error-message").addClass("hidden");
                        $(".btn--user").html(email);
                        setTimeout(() => {
                            $("#success-message").removeClass("hidden");
                        }, 100);
                    }
                    if (data.code == 400) {
                        $("#success-message").addClass("hidden");
                        $("#error-message").addClass("hidden");
                        setTimeout(() => {
                            $("#error-message").removeClass("hidden");
                        }, 100);
                    }
                },
            });
        })
    })

</script>