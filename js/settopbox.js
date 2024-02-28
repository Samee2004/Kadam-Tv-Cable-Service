flatpickr("#stbdate", {
    dateFormat: 'Y-m-d',
    minDate: new Date().fp_incr(1), 
  });

  flatpickr("#stbtime", {
    enableTime: true, // Enable time selection
    noCalendar: true, // Disable calendar
    dateFormat: "H:i", // Format for time (24-hour format)
    minTime: "10:00", // Minimum time
    maxTime: "18:00", // Maximum time
    time_24hr: true // Use 24-hour format
});

$(document).ready(function () {
    $('#signupBtn').click(function () {
        var date = $('#stbdate').val();
        var time = $('#stbtime').val();
        var email = $('#user_email').val();
        // Clear previous error messages
        $('#dateError').addClass('hidden');
        $('#timeError').addClass('hidden');

        if (date.trim() === '') {
            $('#dateError').removeClass('hidden');
            return;
        }

        if (time.trim() === '') {
            $('#timeError').removeClass('hidden');
            return;
        }

        $.ajax({
            url: "../Ajax/install_request.php", // Replace with the actual URL of your server-side script
            type: "POST",
            data: {
              email: email,
              date: date,
              time:time
              // Add more data as needed
            },
            success: function (response) {
              // Handle the response from the server
              console.log(response);
              if (response == 1) {
                Toastify({
                  text: "Request has been made Successfully",
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
                $('#stbdate').val("");
                $('#stbtime').val("");
                window.location.reload();
              } else if (response == 3) {
                Toastify({
                  text: "You already have an set-top box",
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
              }else{
                Toastify({
                    text: "Failed to add request",
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
        