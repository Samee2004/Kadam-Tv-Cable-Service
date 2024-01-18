function addtocart(chan_id) {
    console.log(chan_id);  //16
    var a = []; //
    // Parse the serialized data back into an array of objects
    a = JSON.parse(localStorage.getItem('cart')) || []; //

    // Check if chan_id is already in the array
    if (a.indexOf(chan_id) === -1) {
        // If not present, push the new data onto the array
        a.push(chan_id);
        // Re-serialize the array back into a string and store it in localStorage
        localStorage.setItem('cart', JSON.stringify(a));
        getcartbadge();
    } else {
        console.log("Item is already in the cart.");
    }
}

function getcartbadge() {
    var a=JSON.parse(localStorage.getItem('cart')) || [];
    $("#cartnum").text(a.length);
}
getcartbadge();