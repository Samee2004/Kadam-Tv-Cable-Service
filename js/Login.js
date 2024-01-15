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
      e.preventDefault();
      $.ajax({
        url: "../Ajax/loginajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
          email: email,
          password: password,
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "Login Successfully",
              duration: 3000,
              destination: "https://github.com/apvarun/toastify-js",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "center", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              }, // Callback after click
            }).showToast();

            $("#email").val("");
            $("#password").val("");
            window.location.href="channels.php"
          } else {
            Toastify({
              text: "Login Failed",
              duration: 3000,
              destination: "https://github.com/apvarun/toastify-js",
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "center", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              }, // Callback after click
            }).showToast();
          }
        },
        error: function (error) {
          // Handle errors
          console.error(error);
        },
      });
    });
  });
  