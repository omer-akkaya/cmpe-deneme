<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // Wait document to be ready
    $("document").ready(function () {
        // add onclick function to form button 
        $("button").click(function (event) {
            event.preventDefault();
            const id = $("#id").val()
            const name = $("#name").val()
            const email = $("#email").val()
            const password = $("#password").val()
            const action = $("#action").val()
            const user = { id: id, name: name, email: email, password: password, action: action }
            console.log(user);
            $.ajax({
                url: "api/user.php",
                type: "POST",
                data: user,
                success: function (data) {
                    console.log(data)
                }
            })
        })



        //GET REQUEST FOR USER INFORMATION 
        $.ajax({
            url: "api/user.php",
            type: "get",
            success: function (data) {
                $("#name").val(data.name)
                $("#email").val(data.email)
                $("#password").val(data.password)
                $("#id").val(data.id)
            }
        })




    })

</script>