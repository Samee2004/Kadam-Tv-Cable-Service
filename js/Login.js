$(document).ready(function(){
    $("#loginForm").submit(function(e){
      var email = $("#email").val();
      var password = $("#password").val();
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

      // Reset errors
      $("#emailError").text("");
      $("#passwordError").text("");

      // Validate email
      if (!emailRegex.test(email)) {
        $("#emailError").text("Invalid email address");
        e.preventDefault(); // Prevent form submission
      }

      // Validate password (you can add more conditions)
      if (password.length < 8) {
        $("#passwordError").text("Password must be at least 8 characters");
        e.preventDefault(); // Prevent form submission
      }
    });
  });
  