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
            url:'../Ajax/rechargeajax.php',
            data:{
              pay_id: response.razorpay_payment_id,
              pay_amount: amount,
              //cust_id: $email,
              sub_id:sub_id
            },
            success:function(result){
              if (result == 1) {
                setTimeout(function(){
                  window.location.reload();
               }, 1000);
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
}