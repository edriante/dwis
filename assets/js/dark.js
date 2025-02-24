const switchMode = document.getElementById('switch-mode');
const menuIcon = document.querySelector('.bi-list'); 

// Check localStorage for dark mode preference
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark');
    menuIcon.classList.add('dark-mode-icon');
    switchMode.checked = true; // Set the switch to checked
}

// Event listener for the switch
switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        menuIcon.classList.add('dark-mode-icon');
        localStorage.setItem('darkMode', 'enabled'); // Save preference
    } else {
        document.body.classList.remove('dark');
        menuIcon.classList.remove('dark-mode-icon');
        localStorage.setItem('darkMode', 'disabled'); // Save preference
    }
});