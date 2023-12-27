
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

  // Update channel
  function update_chan(id,img,name,language,genre,quality,price){
    $("#update_name").val('');
    $("#update_chan_language").val('');
    $("#update_chan_quality").val('');
    $("#update_price").val('');
    $("#update_category").val('');
    $('#update_preview1Image1').attr('src', null);
    $('#update-button').click();
    $("#update_name").val(name);
    $("#update_chan_language").val(language);
    $("#update_chan_quality").val(quality);
    $("#update_price").val(price);
    $("#update_category").val(genre);
    $("#channelid").val(id);
    
    // $('#update_preview1Image1').attr('src', img);
    const file = img;
console.log(file);

// Use fetch to get the image as a Blob
fetch(file)
  .then(response => response.blob())
  .then(blob => {
    const reader = new FileReader();
    reader.onload = function(event) {
      console.log("no");
      const img = new Image();
      img.onload = function() {
        const canvas = document.createElement('canvas');
        const maxWidth = 800; // Maximum width for the compressed image
        const maxHeight = 600; // Maximum height for the compressed image

        let width = img.width;
        let height = img.height;

        if (width > height) {
          if (width > maxWidth) {
            height *= maxWidth / width;
            width = maxWidth;
          }
        } else {
          if (height > maxHeight) {
            width *= maxHeight / height;
            height = maxHeight;
          }
        }

        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0, width, height);

        canvas.toBlob(function(blob) {
          const reader = new FileReader();
          reader.onloadend = function() {
            const base64String = reader.result;
            console.log(base64String);
            $("#update_dataURL").val(base64String);
            $('#update_preview1Image1').attr('src', base64String);
          };
          reader.readAsDataURL(blob);

          // Return the processed file blob here
          // For demonstration, let's log the blob to the console
          console.log(blob);
        }, 'image/webp', 0.9);
      };
      img.src = event.target.result;
    };

    reader.readAsDataURL(blob);
  })
  .catch(error => console.error('Error fetching the image:', error));

  }

  $("#update_submit_chann").click(function(e){
    // Reset errors
    $("#update_nameError, #update_priceError, #update_categoryError, #update_chan_languageError, #update_qualityError").text("");

    // Validate Channel Name
    var update_name = $("#update_name").val();
    if (!update_name.trim()) {
      $("#update_nameError").text("Channel Name is required");
      e.preventDefault(); // Prevent form submission
    }

    // Validate Channel language
    var update_chan_language = $("#update_chan_language").val();
    console.log(update_chan_language);
    if (update_chan_language === "Select language") {
      
      $("#update_chan_languageError").text("Channel language is required");
      e.preventDefault(); // Prevent form submission
    }

    // Validate Genre
    var update_category = $("#update_category").val();
    if (update_category === "Select genre") {
      $("#update_categoryError").text("Please select a genre");
      e.preventDefault(); // Prevent form submission
    }

    // Validate QUALITY
    var update_chan_quality = $("#update_chan_quality").val();
    if (update_chan_quality === "Select quality") {
      $("#update_qualityError").text("Please select a quality");
      e.preventDefault(); // Prevent form submission
    }

    // Validate Channel Price
    var update_price = $("#update_price").val();
    if (!update_price || isNaN(update_price) || update_price < 0) {
      $("#update_priceError").text("Channel Price must be a positive number");
      e.preventDefault(); // Prevent form submission
    }

    
    var update_imageURL = $("#update_dataURL").val();
    if(update_imageURL){
      $("#update_categoryError").text("Please select a genre");
      e.preventDefault(); // Prevent form submission
    }
    var update_channelid = $("#channelid").val();
    e.preventDefault();
    $.ajax({
      url: "../Ajax/addchannel.php", // Replace with the actual URL of your server-side script
      type: "POST",
      data: {
        update_name: update_name,
        update_chan_language: update_chan_language,
        update_category: update_category,
        update_chan_quality: update_chan_quality,
        update_price: update_price,
        update_img: update_imageURL,
        update_channelid: update_channelid,
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
          $("#update_name").val('');
          $("#update_chan_language").val('');
          $("#update_chan_quality").val('');
          $("#update_price").val('');
          $("#update_category").val('');
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