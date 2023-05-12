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
