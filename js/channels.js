$email = $('#user_email').val();
console.log($email);
function addtocart(chan_id, type) {
    console.log(chan_id);  // 16
    console.log(type);      // "someType"
    console.log($email);
    var a = [];

    // Parse the serialized data back into an array of objects
    a = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if an item with the same chan_id, type, and user_email is already in the array
    var itemExists = a.some(item => item.chan_id === chan_id && item.type === type && item.user_email === $email);

    if (!itemExists) {
        // If not present, push the new data onto the array
        a.push({ chan_id: chan_id, user_email: $email, type: type });

        // Re-serialize the array back into a string and store it in localStorage
        localStorage.setItem('cart', JSON.stringify(a));
        getcartbadge();
    } else {
        console.log("Item is already in the cart.");
    }
}

function deletefromcart(chan_id, type) {
    var a = [];
    // Parse the serialized data back into an array of objects
    a = JSON.parse(localStorage.getItem('cart')) || [];
    // Find the index of the item with matching chan_id, type, and user_email
    var index = a.findIndex(item => item.chan_id === chan_id && item.type === type && item.user_email === $email);

    if (index !== -1) {
        // If item found, remove it from the array
        a.splice(index, 1);

        // Re-serialize the array back into a string and store it in localStorage
        localStorage.setItem('cart', JSON.stringify(a));
        getcartbadge();
        getcartdetails()
    } else {
        console.log("Item not found in the cart.");
    }
}

function getcartbadge() {
  var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
  // Log all cart items
  cartItems.forEach(item => {
      console.log(item);
  });

  // Filter items based on user email
  var userCartItems = cartItems.filter(item => item.user_email == $email);
  console.log(userCartItems);
  
  // Update the cart badge with the count of user's items
  $("#cartnum").text(userCartItems.length);
}




getcartbadge();

// Example of how to use the deletefromcart function
// deletefromcart(16, "someType");

function getcartdetails() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    // Filter items based on user email
    var userCartItems = cartItems.filter(item => item.user_email === $email);
  const dataOfcart = {
    cart:userCartItems,
  }
  $.ajax({
        url: "../Ajax/cartitem.php", // Replace with the actual URL of your server-side script
        type: "POST",
        data: {
          data:JSON.stringify(dataOfcart),
          // Add more data as needed
        },
        success: function (response) {
          // Handle the response from the server
          $('#cart_container').html("");
          $('#cart_container').html(response);
          cartprice() //calling cart proce function
          if (response == 1) {

          } else {

          }
        },
        error: function (error) {
          // Handle errors
          console.error(error);
        },
      });
}

function cartprice() {

    var values = $('.item_price').map(function() {
        return parseFloat($(this).text()) || 0; // Get the numeric content of each span, handle non-numeric values
    }).get();

    // Calculate the sum of values
    var sum = values.reduce(function(acc, val) {
        console.log("acc,",acc);
        return acc + val;
    }, 0);
    $('#cart_price').text(sum);
    console.log('Sum:', sum);
    GetPayProcess();
}

function GetPayProcess() {
    var priceText = $('#cart_price').text(); // Get the text content of the element
    var priceInteger = parseInt(priceText); // Convert the text to an integer
    console.log(priceText); 
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    // Filter items based on user email
    var userCartItems = cartItems.filter(item => item.user_email === $email);
  const dataOfcart = {
    cart:userCartItems,
  }
      var options = {
        "key": "rzp_test_4yRKKdUKVbIOkX", // Enter the Key ID generated from the Dashboard
        "amount": priceInteger*100,
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
              data:JSON.stringify(dataOfcart),

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
      document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
      }
}

