
  $(document).ready(function(){
    // When the form is submitted
    $("#submit_chann").click(function(e){
      // Reset errors
      $("#nameError, #priceError, #categoryError, #chan_languageError, #qualityError").text("");

      // Validate Channel Name
      var name = $("#name").val();
      if (!name.trim()) {
        $("#nameError").text("Channel Name is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Channel language
      var chan_language = $("#chan_language").val();
      console.log(chan_language);
      if (chan_language === "Select language") {
        
        $("#chan_languageError").text("Channel language is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Genre
      var category = $("#category").val();
      if (category === "Select genre") {
        $("#categoryError").text("Please select a genre");
        e.preventDefault(); // Prevent form submission
      }

      // Validate QUALITY
      var chan_quality = $("#chan_quality").val();
      if (chan_quality === "Select quality") {
        $("#qualityError").text("Please select a quality");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Channel Price
      var price = $("#price").val();
      if (!price || isNaN(price) || price < 0) {
        $("#priceError").text("Channel Price must be a positive number");
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
            chan_language: chan_language,
            category: category,
            chan_quality: chan_quality,
            price: price,
            img:imageURL,
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) { 
            setTimeout(function(){
              window.location.reload();
           }, 1000);
            Toastify({
              text: "Channel added Successfully",
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
            $("#chan_language").val('');
            $("#chan_quality").val('');
            $("#price").val('');
            $("#category").val('');
          } else {
            Toastify({
              text: "Failed To Add",
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

    //Delete channels
  function delete_chan(id){
    console.log(id);
    $.ajax({
      url: "../Ajax/addchannel.php", // Replace with the actual URL of your server-side script
      type: "POST",
      data: {
          id: id
        // Add more data as needed
      },
      success: function (response) {
        // Handle the response from the server
        console.log(response);
        if (response == 1) {
          setTimeout(function(){
            window.location.reload();
         }, 1000);
          Toastify({
            text: "Channel deleted Successfully",
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
          $("#chan_language").val('');
          $("#chan_quality").val('');
          $("#price").val('');
          $("#category").val('');
        } else {
          Toastify({
            text: "Failed To Delete",
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