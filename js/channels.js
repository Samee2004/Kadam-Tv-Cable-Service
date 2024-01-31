$email = $('#user_email').val();

function addtocart(chan_id, type) {
    console.log(chan_id);  // 16
    console.log(type);      // "someType"

    var a = [];

    // Parse the serialized data back into an array of objects
    a = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if an item with the same chan_id and type is already in the array
    var itemExists = a.some(item => item.chan_id === chan_id && item.type === type && item.user_email===$email);

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


function getcartbadge() {
    var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    // Filter items based on user email
    var userCartItems = cartItems.filter(item => item.user_email === $email);
    // Update the cart badge with the count of user's items
    $("#cartnum").text(userCartItems.length);
}

getcartbadge();