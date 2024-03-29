function OpenModal(complaint_id) {
    console.log(complaint_id);
    $("#complaint_id").val("");
    $("#complaint_id").val(complaint_id);    
}

$(document).ready(function() {
    // Function to validate the form
    function validateForm() {
        // Get the values of the input fields
        var complaintId = $("#complaint_id").val().trim();
        var technicanId = $("#technican_id").val();
        
        // Check if the complaint ID is empty
        if (complaintId === "") {
            // If it's empty, show an error message and return false to prevent form submission
            $("#complaint-id-error").text("Please enter a complaint ID.").show();
            return false;
        } else {
            // If it's not empty, hide the error message
            $("#complaint-id-error").hide();
        }

        // Check if a technician is selected
        if (technicanId === null || technicanId === "Choose a Technican" ) {
            // If no technician is selected, show an error message and return false
            $("#technican-id-error").text("Please choose a technician.").show();
            return false;
        } else {
            // If a technician is selected, hide the error message
            $("#technican-id-error").hide();
        }

        // If both fields are valid, return true to allow form submission
        return true;
    }

    // Event listener for form submission
    $("#assignbutt").click(function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        
        // Validate the form
        if (validateForm()) {
            // If the form is valid, submit the form

            var complaintId = $("#complaint_id").val().trim();
            var technicanId = $("#technican_id").val();
            $.ajax({
                url: "../Ajax/complaintajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                    complaintId:complaintId,
                    technicanId:technicanId
                  // Add more data as needed
                },
                success: function (response) {
                  // Handle the response from the server
                  console.log(response);
                  if (response == 1) {
                    Toastify({
                      text: "Successfully assigned",
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
                    // window.location.reload();
                   
                  } else {
                    Toastify({
                      text: "Failed to assign",
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

$("#complaint_status").on("change",function(){
  var complaint_status = $("#complaint_status").val();
  if(complaint_status==="Unresolvable"){
    $("#notsolveddiv").show();
  }
  else{
    $("#notsolveddiv").hide();
  }
})

$(document).ready(function() {
  // Function to validate the form
  function validateForm() {
      // Get the values of the input fields
      var complaintId = $("#complaint_id").val().trim();
      var complaint_status = $("#complaint_status").val();
      
      // Check if the complaint ID is empty
      if (complaintId === "") {
          // If it's empty, show an error message and return false to prevent form submission
          $("#complaint-id-error").text("Please enter a complaint ID.").show();
          return false;
      } else {
          // If it's not empty, hide the error message
          $("#complaint-id-error").hide();
      }

      // Check if a technician is selected
      if (complaint_status === null || complaint_status === "Choose a Status" ) {
          // If no technician is selected, show an error message and return false
          $("#complaint_status-error").text("Please choose a status.").show();
          return false;
      } else {
          // If a technician is selected, hide the error message
          $("#complaint_status-error").hide();
      }

      // If both fields are valid, return true to allow form submission
      return true;
  }

  // Event listener for form submission
  $("#ChangeStatus").click(function(event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      var complaintId = $("#complaint_id").val().trim();
      var complaint_status = $("#complaint_status").val();
      var notsolved= $("#notsolved").val().trim();
      if(complaint_status==="Unresolvable"){
        if (complaintId === "") {
          // If it's empty, show an error message and return false to prevent form submission
          $("#complaint-id-error").text("Please enter a complaint ID.").show();
          return false;
      } else {
          // If it's not empty, hide the error message
          $("#complaint-id-error").hide();
      }

      // Check if a technician is selected
      if (complaint_status === null || complaint_status === "Choose a Status" ) {
          // If no technician is selected, show an error message and return false
          $("#complaint_status-error").text("Please choose a status.").show();
          return false;
      } else {
          // If a technician is selected, hide the error message
          $("#complaint_status-error").hide();
      }
      if (notsolved === "") {
        // If it's empty, show an error message and return false to prevent form submission
        $("#complaint_notsolved-error").text("Please enter a why complaint not solved.").show();
        return false;
    } else {
        // If it's not empty, hide the error message
        $("#complaint_notsolved-error").hide();
    }
      $.ajax({
        url: "../Ajax/complaintajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            Complaint_ID:complaintId,
            Complaint_status:complaint_status,
            Complaint_notsolved : notsolved
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "Successfully changed status",
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
              text: "Failed to change status",
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
      else{
        if (complaintId === "") {
          // If it's empty, show an error message and return false to prevent form submission
          $("#complaint-id-error").text("Please enter a complaint ID.").show();
          return false;
      } else {
          // If it's not empty, hide the error message
          $("#complaint-id-error").hide();
      }

      // Check if a technician is selected
      if (complaint_status === null || complaint_status === "Choose a Status" ) {
          // If no technician is selected, show an error message and return false
          $("#complaint_status-error").text("Please choose a status.").show();
          return false;
      } else {
          // If a technician is selected, hide the error message
          $("#complaint_status-error").hide();
      }
      $.ajax({
        url: "../Ajax/complaintajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            ComplaintID:complaintId,
            Complaint_Status:complaint_status
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "Successfully changed status",
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
              text: "Failed to change status",
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
      // Validate the form
      
  });
});