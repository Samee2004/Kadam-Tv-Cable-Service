$(document).ready(function() {
    // Add event listener to the search input field
    $("#searchpackage").on("input", function() {
        // Get the value of the search input field
        var searchValue = $(this).val().toLowerCase().trim();
        // Iterate through each table row containing package names
        $("#packageTable tbody tr").each(function() {
            // Get the package name from the row
            var packageName = $(this).find(".package-name").text().toLowerCase().trim();
            // Show the row if the package name matches the search query, otherwise hide it
            if (packageName.includes(searchValue)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});