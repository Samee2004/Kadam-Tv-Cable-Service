function PayRecharge(sub_id,amount) {
    console.log(sub_id);
    console.log(amount);
    var options = {
        "key": "rzp_test_4yRKKdUKVbIOkX", // Enter the Key ID generated from the Dashboard
        "amount": amount*100,
        "currency": "INR",
        "description": "Acme Corp",
        "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
        "prefill":
        {
          "email": "ruchi.k@yahoo.com",
          "contact": +919900990090,
        },
        "handler": function (response) {
          console.log(response);
            $.ajax({
            type:'POST',
            url:'../Ajax/paymentajax.php',
            data:{
              pay_id: response.razorpay_payment_id,
              pay_amount: priceInteger,
              cust_id: $email,
              subscribe_id:sub_id
            },
            success:function(result){
              if (result == 1) {
                setTimeout(function(){
                  window.location.reload();
               }, 1000);
                var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
// Delete user's cart items from the original array
cartItems = cartItems.filter(item => item.user_email !== $email);
// Update localStorage with the filtered array
localStorage.setItem('cart', JSON.stringify(cartItems));

// Now, userCartItems contains cart items of the user with email $email
// cartItems contains the updated cart items array with user's items removed


              }else{

              }
                console.log(result);
        
                }
        })
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