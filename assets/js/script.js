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

const menuBar = document.querySelector('#content nav .bi-list'); 
const sidebar = document.getElementById('sidebar');


if (menuBar && sidebar) {
    menuBar.addEventListener('click', function () {
        sidebar.classList.toggle('hide');
    });

    
    function handleResize() {
        if (window.innerWidth <= 576) {
            sidebar.classList.add('hide');
            menuBar.classList.add('hide');
        } else {
            sidebar.classList.remove('hide');
            menuBar.classList.remove('hide');
        }
    }

   
    handleResize();

    
    window.addEventListener('resize', handleResize);
}


