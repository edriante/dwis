const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i => {
			i.parentElement.classList.remove('active');
		});
		li.classList.add('active');
	});
});
// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bi-list'); // Ensure correct selector
const sidebar = document.getElementById('sidebar');

// Ensure elements exist before adding event listeners
if (menuBar && sidebar) {
    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    });

    // Initial width check for hiding elements
    function handleResize() {
        if (window.innerWidth <= 576) {
            sidebar.classList.add('hide');
            menuBar.classList.add('hide');
        } else {
            sidebar.classList.remove('hide');
            menuBar.classList.remove('hide'); // Show menu bar on wider screens
        }
    }

    // Run on page load
    handleResize();

    // Handle window resize event
    window.addEventListener('resize', handleResize);
}


