function deleteStb(stbid) {
    console.log(stbid);
    $("#delete_stb_id").val("");
    $("#delete_stb_id").val(stbid);
}
$("#ConfirmedSubmit").click(function () {
    var delete_stb_id = $("#delete_stb_id").val();
    $.ajax({
        url: "../Ajax/setup_boxajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            delete_stb_id : delete_stb_id
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "STB delete Successfully",
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
              text: " Failed to delete STB",
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
})

    $(document).ready(function() {
        $("#stbAddSubmit").click(function() {
            var serialnum = $("#serialnum").val().trim();
            var stbprice = $("#stbprice").val().trim();
            var isValid = true;

            // Validate serial number
            if (serialnum === "") {
                $("#serialnumError").text("Please enter a package name.");
                isValid = false;
            } else {
                $("#serialnumError").text("");
            }

            // Validate package price
            if (stbprice === "") {
                $("#stbpriceError").text("Please enter a package price.");
                isValid = false;
            } else if (isNaN(stbprice) || parseFloat(stbprice) <= 0) {
                $("#stbpriceError").text("Please enter a valid package price.");
                isValid = false;
            } else {
                $("#stbpriceError").text("");
            }

            // If all validations pass, submit the form
            if (isValid) {
                // Perform your form submission here
                $.ajax({
                    url: "../Ajax/setup_boxajax.php", // Replace with the actual URL of your server-side script
                    type: "POST",
                    data: {
                        serialnum : serialnum,
                        stbprice : stbprice
                      // Add more data as needed
                    },
                    success: function (response) {
                      // Handle the response from the server
                      console.log(response);
                      if (response == 1) {
                        Toastify({
                          text: "Package delete Successfully",
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
                          text: " Failed to delete package",
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

function UpdateSetTopBox(serial_id,price,status) {
    console.log(serial_id);
    $("#updateserialnum").val("");
    $("#updateserialnum").val(serial_id);
    $("#updatestbprice").val("");
    $("#updatestbprice").val(price);
    $("#updatestatus").val("");
    $("#updatestatus").val(status);
}

    $(document).ready(function() {
        $("#stbUpdateSubmit").click(function() {
            var serialnum = $("#updateserialnum").val().trim();
            var stbprice = $("#updatestbprice").val().trim();
            var status = $("#updatestatus").val();
            var isValid = true;

            // Validate STB Serial Number
            if (serialnum === "") {
                $("#updateserialnumError").text("Please enter a STB Serial Number.");
                isValid = false;
            } else {
                $("#updateserialnumError").text("");
            }

            // Validate STB Price
            if (stbprice === "") {
                $("#updatestbpriceError").text("Please enter a STB Price.");
                isValid = false;
            } else if (isNaN(stbprice) || parseFloat(stbprice) <= 0) {
                $("#updatestbpriceError").text("Please enter a valid STB Price.");
                isValid = false;
            } else {
                $("#updatestbpriceError").text("");
            }

            // Validate Status
            if (status === "Choose") {
                $("#updatestatusError").text("Please select a status.");
                isValid = false;
            } else {
                $("#updatestatusError").text("");
            }

            // If all validations pass, submit the form
            if (isValid) {
                // Perform your form submission here
                $.ajax({
                    url: "../Ajax/setup_boxajax.php", // Replace with the actual URL of your server-side script
                    type: "POST",
                    data: {
                        updateserialnum : serialnum,
                        updatestbprice : stbprice,
                        updatestatus : status 
                      // Add more data as needed
                    },
                    success: function (response) {
                      // Handle the response from the server
                      console.log(response);
                      if (response == 1) {
                        Toastify({
                          text: "Updated Successfully",
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
                          text: " Failed to Update",
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

