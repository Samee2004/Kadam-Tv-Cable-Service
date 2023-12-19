
  $(document).ready(function(){
    // When the form is submitted
    $("form").submit(function(e){
      // Reset errors
      $("#nameError, #priceError, #categoryError, #chan_numberError").text("");

      // Validate Channel Name
      var name = $("#name").val();
      if (!name.trim()) {
        $("#nameError").text("Channel Name is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Channel Number
      var chan_number = $("#chan_number").val();
      if (!chan_number || isNaN(chan_number) || chan_number < 0) {
        $("#chan_numberError").text("Channel number must be a positive number");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Channel Price
      var price = $("#price").val();
      if (!price || isNaN(price) || price < 0) {
        $("#priceError").text("Channel Price must be a positive number");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Genre
      var category = $("#category").val();
      if (category === "Select genre") {
        $("#categoryError").text("Please select a genre");
        e.preventDefault(); // Prevent form submission
      }
      var imageURL = $("#dataURL").val();
      if(imageURL){
        $("#categoryError").text("Please select a genre");
        e.preventDefault(); // Prevent form submission
      }
      e.preventDefault();
      $.ajax({
        url: "../Ajax/addchannel.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            name: name,
            chan_number: chan_number,
            price: price,
            category: category,
            img:imageURL,
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
            $("#name").val('');
            $("#chan_number").val('');
            $("#price").val('');
            $("#category").val('');
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
