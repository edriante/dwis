const switchMode = document.getElementById('switch-mode');
const menuIcon = document.querySelector('.bi-list'); 

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        menuIcon.classList.add('dark-mode-icon');
    } else {
        document.body.classList.remove('dark');
        menuIcon.classList.remove('dark-mode-icon');
    }
});