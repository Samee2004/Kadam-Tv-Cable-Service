$(document).ready(function () {
    $("#updateForm").click(function (e) {
      var FisrtName = $("#first-name").val();
      var MiddeName = $("#middle-name").val();
      var LastName = $("#last-name").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var flat = $("#flat").val();
      var building = $("#building").val();
      var streetAddress = $("#street-address").val();
      var pincode = $("#pincode").val();
      var id = $("#user_email").val();
      // Reset errors
      $("#FirstError").text("");
      $("#MiddleError").text("");
      $("#LastError").text("");
      $("#emailError").text("");
      $("#contactError").text("");
      $("#flatError").text("");
      $("#buildingError").text("");
      $("#streetAddressError").text("");
      $("#pincodeError").text("");
  
      // Validate First Name
      if (!FisrtName.trim()) {
        $("#FirstError").text("First Name is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
      // Validate Middle Name
      if (!MiddeName.trim()) {
        $("#MiddleError").text("Middle Name is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
      // Validate Last Name
      if (!LastName.trim()) {
        $("#LastError").text("Last Name is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
      // Validate Email
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailRegex.test(email)) {
        $("#emailError").text("Invalid email address");
        e.preventDefault(); // Prevent form submission
        return;
      }
  
      // Validate Contact
      var contactRegex = /^[0-9]{10}$/;
      if (!contactRegex.test(contact)) {
        $("#contactError").text("Invalid contact number");
        e.preventDefault(); // Prevent form submission
        return;
      }
  
   
  
      // Validate Flat
      if (!flat.trim()) {
        $("#flatError").text("Flat is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
  
      // Validate Building
      if (!building.trim()) {
        $("#buildingError").text("Building is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
  
      // Validate Street Address
      if (!streetAddress.trim()) {
        $("#streetAddressError").text("Street Address is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
  
      // Validate Pincode
      if (!pincode.trim()) {
        $("#pincodeError").text("Pincode is required");
        e.preventDefault(); // Prevent form submission
        return;
      }
      
      e.preventDefault();
      // If all validations pass, make the AJAX call
      $.ajax({
        url: "../Ajax/updateajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
          FisrtName: FisrtName,
          MiddeName: MiddeName,
          LastName: LastName,
          email: email,
          contact: contact,
          flat: flat,
          building: building,
          streetAddress: streetAddress,
          pincode: pincode,
          id:id,
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "Successfully Updated",
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
            window.location.reload();
          
          } else {
            Toastify({
              text: "Failed to updated",
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
  