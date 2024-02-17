$("#search_button").click(function (e) {
    var input_search = $("#default-search").val().toLowerCase(); // Get the input value and convert to lowercase for case-insensitive comparison
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


$(".filterlanguage").on("click", function() {   
    // Define an array to store the values of checked checkboxes
    var checkedValues = [];
    // Iterate through each checked checkbox with the class filterlanguage
    $('.filterlanguage:checked').each(function() {
        // Push the value of each checked checkbox to the array
        checkedValues.push($(this).val());
    });
    
    // Check if no checkboxes are checked
    if (checkedValues.length === 0) {
        // If no checkboxes are checked, show all .channel_name elements
        $('.channel_name').show();
    } else {
        // If checkboxes are checked, filter .channel_name elements based on checked values
        $('.channel_name').each(function() {
            var languagename = $(this).find('.languagename').text().trim();
            console.log("Language Name:", languagename);

            var matched = false;
            // Iterate through each checked value
            for (var i = 0; i < checkedValues.length; i++) {
                // Check if the languagename includes the current checked value
                if (languagename.includes(checkedValues[i])) {
                    matched = true;
                    break; // No need to continue checking if a match is found
                }
            }
            // Show or hide the element based on whether it matches any checked value
            if (matched) {
                $(this).show(); // For example, show the matched element
            } else {
                $(this).hide(); // For example, hide the unmatched element
            }
        });
    }
});




$(".filter_genre").on("click", function() {   
    // Define an array to store the values of checked checkboxes
    var checkedValues = [];
    // Iterate through each checked checkbox with the class filterlanguage
    $('.filter_genre:checked').each(function() {
        // Push the value of each checked checkbox to the array
        checkedValues.push($(this).val());
    });
    // Check if no checkboxes are checked
    if (checkedValues.length === 0) {
        // If no checkboxes are checked, show all .channel_name elements
        $('.channel_name').show();
    } else {
        // If checkboxes are checked, filter .channel_name elements based on checked values
        $('.channel_name').each(function() {
            var channelgenre = $(this).find('.channelgenre').text().trim();
            var matched = false;
            // Iterate through each checked value
            for (var i = 0; i < checkedValues.length; i++) {
                // Check if the languagename includes the current checked value
                if (channelgenre.includes(checkedValues[i])) {
                    matched = true;
                    break; // No need to continue checking if a match is found
                }
            }
            // Show or hide the element based on whether it matches any checked value
            if (matched) {
                $(this).show(); // For example, show the matched element
            } else {
                $(this).hide(); // For example, hide the unmatched element
            }
        });
    }
});



$(".filter_quality").on("click", function() {   
    // Define an array to store the values of checked checkboxes
    var checkedValues = [];
    // Iterate through each checked checkbox with the class filterlanguage
    $('.filter_quality:checked').each(function() {
        // Push the value of each checked checkbox to the array
        checkedValues.push($(this).val());
    });
    // Check if no checkboxes are checked
    if (checkedValues.length === 0) {
        // If no checkboxes are checked, show all .channel_name elements
        $('.channel_name').show();
    } else {
        // If checkboxes are checked, filter .channel_name elements based on checked values
        $('.channel_name').each(function() {
            var channelquality = $(this).find('.channelquality').text().trim();
            var matched = false;
            // Iterate through each checked value
            for (var i = 0; i < checkedValues.length; i++) {
                // Check if the languagename includes the current checked value
                if (channelquality.includes(checkedValues[i])) {
                    matched = true;
                    break; // No need to continue checking if a match is found
                }
            }
            // Show or hide the element based on whether it matches any checked value
            if (matched) {
                $(this).show(); // For example, show the matched element
            } else {
                $(this).hide(); // For example, hide the unmatched element
            }
        });
    }
});


