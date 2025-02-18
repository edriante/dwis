document.addEventListener("DOMContentLoaded", function () {
    // Select search inputs for both services and users
    const serviceSearchInput = document.getElementById("serviceSearch");
    const userSearchInput = document.getElementById("userSearch");

    // Select table rows for both services and users
    const serviceTableRows = document.querySelectorAll("#serviceTable tbody tr");
    const userTableRows = document.querySelectorAll("#userTable tbody tr");

    // Function to handle search functionality
    function handleSearch(input, rows, columns) {
        input.addEventListener("keyup", function () {
            let filter = input.value.toLowerCase(); // Get the search input and convert to lowercase

            rows.forEach(function (row) {
                let matches = false;
                columns.forEach(function (columnIndex) {
                    let columnText = row.children[columnIndex].textContent.toLowerCase(); // Get text content of column
                    if (columnText.includes(filter)) {
                        matches = true;
                    }
                });

                // Show or hide row based on whether it matches the search filter
                row.style.display = matches ? "" : "none";
            });
        });
    }

    // Only attach search functionality for services if the serviceSearchInput exists
    if (serviceSearchInput && serviceTableRows.length > 0) {
        handleSearch(serviceSearchInput, serviceTableRows, [1, 2, 3, 4, 5]);
    }

    // Only attach search functionality for users if the userSearchInput exists
    if (userSearchInput && userTableRows.length > 0) {
        handleSearch(userSearchInput, userTableRows, [1, 2, 3]);
    }
});
