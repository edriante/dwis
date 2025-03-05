$(document).ready(function() {
    $("#logoutBtn").click(function(event) {
        event.preventDefault(); 
        if (confirm("Are you sure you want to logout?")) {
            var logoutUrl = $(this).data('logout-url'); 
            console.log("Redirecting to: " + logoutUrl);
            
            window.location.href = logoutUrl;
        }
    });
});