$(document).ready(function() {
    // Function to validate the form
    function validateForm() {
        // Get the value of the textarea
        var description = $("#description").val().trim();

        // Check if the textarea is empty
        if (description === "") {
            // If it's empty, show an error message and return false to prevent form submission
            $("#error-message").text("Please write your complaint/issues.").show();
            return false;
        } else {
            // If it's not empty, hide the error message and return true to allow form submission
            $("#error-message").hide();
            return true;
        }
    }

    // Event listener for form submission
    $("#complaint").click(function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        
        // Validate the form
        if (validateForm()) {
            // If the form is valid, submit the form
            var description = $("#description").val().trim();
            var userid= $('#user_email').val();
            $.ajax({
                url: "../Ajax/complaintajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                    description: description,
                    userid: userid,
                  // Add more data as needed
                },
                success: function (response) {
                  // Handle the response from the server
                  console.log(response);
                  if (response == 1) {
                    Toastify({
                      text: "Complaint added Successfully",
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
        
                    $("#description").val("");
                    window.location.reload();
                  } else {
                    Toastify({
                      text: "Complaint Failed to make",
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
        }
    });
});
