document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("userSearch");
    const tableRows = document.querySelectorAll("tbody tr"); // Select all table rows

    searchInput.addEventListener("keyup", function () {
        let filter = searchInput.value.toLowerCase(); // Get the search input and convert to lowercase

        tableRows.forEach(function (row) {
            let username = row.children[1].textContent.toLowerCase(); // Get the username column
            let fullname = row.children[2].textContent.toLowerCase(); // Get the fullname column
            let email = row.children[3].textContent.toLowerCase(); // Get the email column

            // Check if the filter matches any of these fields
            if (username.includes(filter) || fullname.includes(filter) || email.includes(filter)) {
                row.style.display = ""; // Show matching row
            } else {
                row.style.display = "none"; // Hide non-matching row
            }
        });
    });
});
