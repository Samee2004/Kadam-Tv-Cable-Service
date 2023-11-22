$(document).ready(function(){
    $("#registerForm").submit(function(e){
      var fullName = $("#full-name").val();
      var email = $("#email").val();
      var contact = $("#contact").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirm-password").val();
      var flat = $("#flat").val();
      var building = $("#building").val();
      var streetAddress = $("#street-address").val();

      // Reset errors
      $("#fullNameError").text("");
      $("#emailError").text("");
      $("#contactError").text("");
      $("#passwordError").text("");
      $("#confirmPasswordError").text("");
      $("#flatError").text("");
      $("#buildingError").text("");
      $("#streetAddressError").text("");

      // Validate Full Name
      if (!fullName.trim()) {
        $("#fullNameError").text("Full Name is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Email
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailRegex.test(email)) {
        $("#emailError").text("Invalid email address");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Contact
      var contactRegex = /^[0-9]{10}$/;
      if (!contactRegex.test(contact)) {
        $("#contactError").text("Invalid contact number");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Password (you can add more conditions)
      if (password.length < 8) {
        $("#passwordError").text("Password must be at least 8 characters");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Confirm Password
      if (password !== confirmPassword) {
        $("#confirmPasswordError").text("Passwords do not match");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Flat
      if (!flat.trim()) {
        $("#flatError").text("Flat is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Building
      if (!building.trim()) {
        $("#buildingError").text("Building is required");
        e.preventDefault(); // Prevent form submission
      }

      // Validate Street Address
      if (!streetAddress.trim()) {
        $("#streetAddressError").text("Street Address is required");
        e.preventDefault(); // Prevent form submission
      }
    });
  });