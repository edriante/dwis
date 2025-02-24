
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("userSearch");
    const searchButton = document.querySelector(".search-container button");
    
    searchButton.addEventListener("click", function () {
        console.log("Search Query:", searchInput.value.trim());
    });
});
