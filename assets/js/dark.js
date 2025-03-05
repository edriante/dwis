const switchMode = document.getElementById('switch-mode');
const menuIcon = document.querySelector('.bi-list'); 


if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark');
    menuIcon.classList.add('dark-mode-icon');
    switchMode.checked = true; 
}


switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        menuIcon.classList.add('dark-mode-icon');
        localStorage.setItem('darkMode', 'enabled'); 
    } else {
        document.body.classList.remove('dark');
        menuIcon.classList.remove('dark-mode-icon');
        localStorage.setItem('darkMode', 'disabled');
    }
});