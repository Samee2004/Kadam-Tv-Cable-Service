$("#search_button").click(function (e) {
    var input_search = $("#default-search").val().toLowerCase(); // Get the input value and convert to lowercase for case-insensitive comparison
    console.log("Search Query:", input_search);
    
    // Loop through each .channel_name element
    $('.channel_name').each(function() {
        var channame = $(this).find('h2').text().toLowerCase().trim(); // Get the text content of the <h2> element and convert to lowercase
        console.log("Channel Name:", channame);
        
        // Check if the channel name contains the search query
        if (channame.includes(input_search)) {
            // Perform actions for matched elements (e.g., show/hide, apply styles, etc.)
            $(this).show(); // For example, show the matched element
        } else {
            // Perform actions for unmatched elements
            $(this).hide(); // For example, hide the unmatched element
        }
    });
});
