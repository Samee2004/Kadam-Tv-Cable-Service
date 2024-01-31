$email = $('#user_email').val();

function addtocart(chan_id, type) {
    console.log(chan_id);  // 16
    console.log(type);      // "someType"

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
    // Filter items based on user email
    var userCartItems = cartItems.filter(item => item.user_email === $email);
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
  console.log(userCartItems);
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
          console.log(response);
          $('#cart_container').html("");
          $('#cart_container').html(response);

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