$(document).ready(function () {
  $("#registerForm").click(function (e) {
    var FisrtName = $("#first-name").val();
    var MiddeName = $("#middle-name").val();
    var LastName = $("#last-name").val();
    var email = $("#email").val();
    var contact = $("#contact").val();
    var flat = $("#flat").val();
    var building = $("#building").val();
    var streetAddress = $("#street-address").val();
    var role = $("#role").val();
    var city = $("#city").val();
    // Reset errors
    $("#FirstError").text("");
    $("#MiddleError").text("");
    $("#LastError").text("");
    $("#emailError").text("");
    $("#contactError").text("");
    $("#flatError").text("");
    $("#buildingError").text("");
    $("#streetAddressError").text("");
    $("#roleError").text("");
    $("#cityError").text("");

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
    if (!role.trim()) {
      $("#roleError").text("Role is required");
      e.preventDefault(); // Prevent form submission
      return;
    }
    if (!city.trim()) {
      $("#cityError").text("City is required");
      e.preventDefault(); // Prevent form submission
      return;
    }

    e.preventDefault();
    console.log("done");
    // If all validations pass, make the AJAX call
    $.ajax({
      url: "../Ajax/employeeajax.php", // Replace with the actual URL of your server-side script
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
        role: role,
        city: city,
        // Add more data as needed
      },
      success: function (response) {
        // Handle the response from the server
        console.log(response);
        if (response == 1) {
          Toastify({
            text: "Successfully registered",
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

          $("#first-name").val("");
          $("#middle-name").val("");
          $("#last-name").val("");
          $("#email").val("");
          $("#contact").val("");
          $("#flat").val("");
          $("#building").val("");
          $("#street-address").val("");
          $("#role").val("");
          $("#city").val("");
          window.location.reload();
        } else {
          Toastify({
            text: "Failed to registered",
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
function onDeleteButton(emp_email) {
  console.log(emp_email);
  $("#delete_employee_id").val("");
  $("#delete_employee_id").val(emp_email);
}
function onUpdateButton(emp_email) {
    console.log(emp_email);
    $.ajax({
        url: "../Ajax/employeeajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            get_employee_id: emp_email,
            // Add more data as needed
        },
        dataType: "json", // Specify the expected data type as JSON
        success: function(response) {
            // Handle the response from the server
            console.log(response[0]);
            $("#update-first-name").val("");
            $("#update-middle-name").val("");
            $("#update-last-name").val("");
            $("#update-email").val("");
            $("#update-contact").val("");
            $("#update-flat").val("");
            $("#update-building").val("");
            $("#update-street-address").val("");
            $("#update-role").val("");
            $("#update-city").val("");
            $("#update-first-name").val(response[0].emp_fname);
            $("#update-middle-name").val(response[0].emp_mname);
            $("#update-last-name").val(response[0].emp_lname);
            $("#update-email").val(response[0].emp_email);
            $("#update-contact").val(response[0].emp_phone);
            $("#update-flat").val(response[0].emp_flat);
            $("#update-building").val(response[0].emp_building);
            $("#update-street-address").val(response[0].emp_street);
            $("#update-role").val(response[0].emp_role);
            $("#update-city").val(response[0].emp_city);

            // Process the JSON data here
        },
        error: function(error) {
            // Handle errors
            console.error(error);
        }
    });
    
}
$("#ConfirmedSubmit").click(function (e) {
  var delete_employee_id = $("#delete_employee_id").val();
  e.preventDefault();
  $.ajax({
    url: "../Ajax/employeeajax.php", // Replace with the actual URL of your server-side script
    type: "POST",
    data: {
      delete_employee_id: delete_employee_id,
      // Add more data as needed
    },
    success: function (response) {
      // Handle the response from the server
      console.log(response);
      if (response == 1) {
        Toastify({
          text: "Successfully deleted",
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
          text: "Failed to delete",
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

$("#UpdateForm").click(function (e) {
  // Assuming this code is within a function that is triggered upon form submission
  var updateFirstName = $("#update-first-name").val().trim();
  var updateMiddleName = $("#update-middle-name").val().trim();
  var updateLastName = $("#update-last-name").val().trim();
  var updateEmail = $("#update-email").val().trim();
  var updateContact = $("#update-contact").val().trim();
  var updateFlat = $("#update-flat").val().trim();
  var updateBuilding = $("#update-building").val().trim();
  var updateStreetAddress = $("#update-street-address").val().trim();
  var updateRole = $("#update-role").val().trim();
  var updateCity = $("#update-city").val().trim();

  // Reset errors
  $("#UpdateFirstError").text("");
  $("#UpdateMiddleError").text("");
  $("#UpdateLastError").text("");
  $("#UpdateemailError").text("");
  $("#UpdatecontactError").text("");
  $("#UpdateflatError").text("");
  $("#UpdatebuildingError").text("");
  $("#UpdatestreetAddressError").text("");
  $("#UpdateroleError").text("");
  $("#UpdatecityError").text("");

  // Validate First Name
  if (!updateFirstName) {
    $("#UpdateFirstError").text("First Name is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Middle Name
  if (!updateMiddleName) {
    $("#UpdateMiddleError").text("Middle Name is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Last Name
  if (!updateLastName) {
    $("#UpdateLastError").text("Last Name is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Email
  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!emailRegex.test(updateEmail)) {
    $("#UpdateemailError").text("Invalid email address");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Contact
  var contactRegex = /^[0-9]{10}$/;
  if (!contactRegex.test(updateContact)) {
    $("#UpdatecontactError").text("Invalid contact number");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Flat
  if (!updateFlat) {
    $("#UpdateflatError").text("Flat is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Building
  if (!updateBuilding) {
    $("#UpdatebuildingError").text("Building is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Street Address
  if (!updateStreetAddress) {
    $("#UpdatestreetAddressError").text("Street Address is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate Role
  if (!updateRole) {
    $("#UpdateroleError").text("Role is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  // Validate City
  if (!updateCity) {
    $("#UpdatecityError").text("City is required");
    e.preventDefault(); // Prevent form submission
    return;
  }

  e.preventDefault();
  console.log("done");
  // If all validations pass, make the AJAX call
  $.ajax({
    url: "../Ajax/employeeajax.php", // Replace with the actual URL of your server-side script
    type: "POST",
    data: {
        updateFirstName: updateFirstName,
        updateMiddleName: updateMiddleName,
        updateLastName: updateLastName,
        updateEmail: updateEmail,
        updateContact: updateContact,
        updateFlat: updateFlat,
        updateBuilding: updateBuilding,
        updateStreetAddress: updateStreetAddress,
        updateRole: updateRole,
        updateCity: updateCity
        // Add more data as needed
    },
    
    success: function (response) {
      // Handle the response from the server
      console.log(response);
      if (response == 1) {
        Toastify({
          text: "Successfully updated",
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

        // Reset input fields and reload page
        $("#update-first-name").val("");
        $("#update-middle-name").val("");
        $("#update-last-name").val("");
        $("#update-email").val("");
        $("#update-contact").val("");
        $("#update-flat").val("");
        $("#update-building").val("");
        $("#update-street-address").val("");
        $("#update-role").val("");
        $("#update-city").val("");
        window.location.reload();
      } else {
        Toastify({
          text: "Failed to update",
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
