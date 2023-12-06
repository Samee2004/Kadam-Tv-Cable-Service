$("#page1").show();
$("#page2").hide();
$("#page3").hide();
$('#invalidotp').hide();
function OTPInput() {
    const inputs = document.querySelectorAll('#otp > *[id]');
    console.log("yes");
    for (let i = 0; i < inputs.length; i++) 
    { 
        inputs[i].addEventListener('keydown', function(event) 
        { 
            if (event.key==="Backspace" ) 
            { 
                inputs[i].value='' ; 
                if (i !==0) inputs[i - 1].focus(); 
            } 
            else 
            { 
                if (i===inputs.length - 1 && inputs[i].value !=='' ) 
                { 
                    return true; 
                } 
                else if (event.keyCode> 47 && event.keyCode < 58) 
                { 
                    inputs[i].value=event.key; 
                    $value = inputs[i].value;
                    if (i !==inputs.length - 1) inputs[i + 1].focus(); 
                    event.preventDefault(); 
                } 
                
            } 
        });
     } 
    } 
    OTPInput();



// $(".otp-input").on("input", function(e) {
//     var input = e.target;
//     var value = input.value;
    
//     // Allow only integers
//     if (!/^\d*$/.test(value)) {
//       input.value = value.replace(/[^\d]/g, '');
//     }

//     // Move to the next input field on non-backspace
//     if (value !== "" && e.which !== 8) {
//       var nextInput = $(this).parent().next().find(".otp-input");
//       if (nextInput.length > 0) {
//         nextInput.focus();
//       }
//     }

//     // Clear current input and move to the previous input on backspace
//     if (e.which === 8) {
//       input.value = "";
//       var prevInput = $(this).parent().prev().find(".otp-input");
//       if (prevInput.length > 0) {
//         prevInput.focus();
//       }
//     }
//   });
var val = 0;
function generateOtp()
{
    val = Math.floor(1000 + Math.random() * 9000);
    console.log(val);

}
$("#reset").click(function(){
    var email = $("#email").val();
    $.ajax({
        url: "../Ajax/forgotpassajax.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
          email: email,
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          console.log(response);
          if (response == 1) {
            Toastify({
              text: "OTP sent on your email",
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
            generateOtp();
    sendemail(email,val);
    $("#page1").hide();
    $("#page2").show();
        $("#displayemail").text(email);

          } else {
            Toastify({
              text: "user doesn't exist",
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
$('#verifyOtp').on('click',function()
        {
            
            const inputs = document.querySelectorAll('#otp > *[id]');
            var count = 0;
            for (let i = 0; i < inputs.length; i++) 
            {
                if(inputs[i].value!=="")
                {
                    count = count + 1;
                    
                }else{
                    alert("Please fill all the otp fields");
                    break;
                }
            } 
            if(count===inputs.length)
            {
                    $otp_number = Number($('#first').val()+$('#second').val()+$('#third').val()+$('#fourth').val());
                    console.log($otp_number);
                    if($otp_number===val)
                    {
                        $('#invalidotp').hide();
                        $("#page2").hide();
                        $("#page3").show();
                    }else{
                        $("#first, #second, #third, #fourth").effect( "shake", { 
                            direction: 'left', 
                            times: 4, 
                            distance: 10
                        }, 1000 ).css("border-color", "red");
                        $('#invalidotp').show();

                        
                    }
                    
            }  
            
        })
        $("#changepass").click(function(e) {
            var password = $("#password").val();
            var confirmPassword = $("#confirm-password").val();
            var errorElement = $("#password-error");
            var email = $("#email").val();
            e.preventDefault();
      
            if (password.length < 8) {
              errorElement.text("Password must be at least 8 characters long");
              e.preventDefault(); // Prevent form submission
            } else if (password !== confirmPassword) {
              errorElement.text("Passwords do not match");
              e.preventDefault(); // Prevent form submission
            } else {
              errorElement.text("");
              $.ajax({
                url: "../Ajax/forgotpassajax.php", // Replace with the actual URL of your server-side script
                type: "POST",
                data: {
                  re_email: email,
                  password: password
                  // Add more data as needed
                },
                success: function (response) {
                  // Handle the response from the server
                  console.log(response);
                  if (response == 1) {
                    Toastify({
                      text: "Password changed successfully",
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
                    $("#password").val("");
                    $("#confirm-password").val("");
                    window.location.href="Login.php"
        
                  } else {
                    Toastify({
                      text: "Password failed to change",
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
function sendemail(email,val){
    console.log(email);
    console.log(val);
    Email.send({
        SecureToken : "4e1d1045-9f75-45bd-9fef-297a69bc3e72",
        To :email,
        From : "sameekshakadam23@gmail.com",
        Subject : "Forget password",
        Body : "Your OTP is "+val+" "
    }).then(
      message => alert(message)
    );
}
