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
const menuBar = document.querySelector('#content nav .bi.bi-list');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
});

const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bi');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if (window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if (searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bi-search', 'bi-x'); // Updated icon class
		} else {
			searchButtonIcon.classList.replace('bi-x', 'bi-search'); // Updated icon class
		}
	}
});

if (window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bi-x', 'bi-search'); // Updated icon class
	searchForm.classList.remove('show');
}

window.addEventListener('resize', function () {
	if (this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bi-x', 'bi-search'); // Updated icon class
		searchForm.classList.remove('show');
	}
});
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("userSearch");
    const searchButton = document.querySelector(".search-container button");
    
    searchButton.addEventListener("click", function () {
        console.log("Search Query:", searchInput.value.trim());
    });
});
