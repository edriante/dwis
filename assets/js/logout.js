$(document).ready(function() {
    $("#logoutBtn").click(function(event) {
        event.preventDefault(); // Prevent default action if it's a form submission

        if (confirm("Are you sure you want to logout?")) {
            // Redirect to the logout URL
            window.location.href = "<?= base_url('auth/logout'); ?>"; // Adjust the URL as needed
        }
    });
});