var price;
$(".price_card").hide();
function generateRandomString(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = 'pay_';
    for (let i = 0; i < length - 4; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

function OpenModal(install_id) {
    console.log(install_id);
    $("#install_id").val("");
    $("#install_id").val(install_id);
    $.ajax({
        url: "../Ajax/install_request.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            install_id_price : install_id,
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          price = response;
          $("#stb_price").val("");
          $("#stb_price").val(response);
        },
        error: function (error) {
          // Handle errors
          console.error(error);
        },
      });
}
var installation_price = 1000;

$("#install_status").on("change",function () {
    var install_status = $("#install_status").val().trim();
    
    if (install_status==="Failed") {
        $("#payment_status").prop('disabled', true);
    }else{
        $("#payment_status").prop('disabled', false);
    }
})

$("#payment_status").on("change",function () {
    var payment_status = $("#payment_status").val();
    console.log(payment_status);
    if (payment_status==="Online") {
        $(".price_card").hide();
    }
    if (payment_status==="Offline") {
        console.log("offlineeeee");
        $(".price_card").show();
    }
})
$("#ChangeStatus").click(function(event){
    event.preventDefault();
    var install_id = $("#install_id").val().trim();
    var payment_status = $("#payment_status").val();
    var install_status = $("#install_status").val().trim();
    if (install_status === null || install_status === "Choose a Status") {
        // If it's empty, show an error message and return false to prevent form submission
        $("#install_status-error").text("Please choose a set-tob box.").show();
        return false;
    } else {
        // If it's not empty, hide the error message
        $("#install_status-error").hide();
    }
    if (install_status==="Failed") {
            $.ajax({
            url: "../Ajax/install_request.php", // Replace with the actual URL of your server-side script
            type: "POST",
            data: {
                install_id_status_failure : install_id,
                install_status_failure:install_status
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
    }else{
        if (payment_status === null || payment_status === "Choose a status" ) {
            // If no technician is selected, show an error message and return false
            $("#payment_status-error").text("Please choose a payment status.").show();
            return false;
        } else {
            // If a technician is selected, hide the error message
            $("#payment_status-error").hide();
        }
        if (payment_status==="Online") {
            var options = {
                "key": "rzp_test_4yRKKdUKVbIOkX", // Enter the Key ID generated from the Dashboard
                "amount": price*100,
                "currency": "INR",
                "description": "Acme Corp",
                "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                "prefill":
                {
                  "email": "ruchi.k@yahoo.com",
                  "contact": +919900990090,
                },
                "handler": function (response) {
                  console.log(response.razorpay_payment_id);
                  AddPayInfo(price,response.razorpay_payment_id,"online",install_id);
                },
                "modal": {
                  "ondismiss": function () {
                    if (confirm("Are you sure, you want to close the form?")) {
                      txt = "You pressed OK!";
                      console.log("Checkout form closed by the user");
                    } else {
                      txt = "You pressed Cancel!";
                      console.log("Complete the Payment")
                    }
                  }
                }
              };
              var rzp1 = new Razorpay(options);
              
                rzp1.open();
                e.preventDefault();
              
        }
        if (payment_status==="Offline") {
            var stb_price = $("#stb_price").val();
            AddPayInfo(stb_price,generateRandomString(17),"offline",install_id);
        }
        
    }
});

function AddPayInfo(amount,id,status,install_id) {
    console.log(amount,id,status,install_id);
    $.ajax({
        url: "../Ajax/install_request.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
            install_amount : amount,
            pay_id:id,
            pay_status : status,
            install_idd : install_id,
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
            window.location.reload();
           
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