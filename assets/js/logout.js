$(document).ready(function() {
    $("#logoutBtn").click(function(event) {
        event.preventDefault(); // Prevent default action if it's a form submission

        if (confirm("Are you sure you want to logout?")) {
            var logoutUrl = $(this).data('logout-url'); // Get the URL from the data attribute
            console.log("Redirecting to: " + logoutUrl); // Log the URL for debugging
            // Redirect to the logout URL
            window.location.href = logoutUrl;
        }
    });
});