document.addEventListener("DOMContentLoaded", function () {

    const serviceSearchInput = document.getElementById("serviceSearch");
    const userSearchInput = document.getElementById("userSearch");
    const categorySearchInput = document.getElementById("categorySearch");
    const serviceTableRows = document.querySelectorAll("#serviceTable tbody tr");
    const userTableRows = document.querySelectorAll("#userTable tbody tr");
    const categoryTableRows = document.querySelectorAll("#categoryTable tbody tr");
    
    function handleSearch(input, rows, columns) {
        input.addEventListener("keyup", function () {
            let filter = input.value.toLowerCase();

            rows.forEach(function (row) {
                let matches = false;
                columns.forEach(function (columnIndex) {
                    let columnText = row.children[columnIndex].textContent.toLowerCase();
                    if (columnText.includes(filter)) {
                        matches = true;
                    }
                });

                
                row.style.display = matches ? "" : "none";
            });
        });
    }

    
    if (serviceSearchInput && serviceTableRows.length > 0) {
        handleSearch(serviceSearchInput, serviceTableRows, [1, 2, 3, 4, 5]);
    }

    
    if (userSearchInput && userTableRows.length > 0) {
        handleSearch(userSearchInput, userTableRows, [1, 2, 3]);
    }

    if (categorySearchInput && categoryTableRows.length > 0) {
        handleSearch(categorySearchInput, categoryTableRows, [1, 2, 3]);
    }
});
