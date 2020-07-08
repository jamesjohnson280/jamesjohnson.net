/* Clears the selected nav item in the main menu */
function clearSelectedNav() {
	'use strict';
	var elems = document.querySelectorAll('.nav-btn');
	for (var i = 0; i < elems.length; i++) {
		elems[i].classList.remove('selected');
	}
}

/* Fades out the body content when user clicks on a work link */
function fadeNavLink(e) {
	'use strict';
	e.preventDefault();
	document.querySelector('#portfolio-piece').classList.add('fade-out');
	var loc = this.href;
	document.querySelector('#portfolio-piece').addEventListener('transitionend', function() {
		window.location = loc;
	});
}

/* Main */
window.addEventListener('load', function() {
	'use strict';
	/* Inline JS */
	/* Toggle menu when button is clicked. */
	document.getElementById('menu-btn').addEventListener('click', function() {
		var menu = document.getElementById('menu');
		var icon = document.getElementById('menu-open-icon');
		if (menu.classList.contains('closed') || !menu.classList.contains('open')) {
			menu.classList.remove('closed');
			menu.classList.add('open');
			icon.classList.remove('fa-bars');
			icon.classList.add('fa-close');
		} else {
			menu.classList.remove('open');
			menu.classList.add('closed');
			icon.classList.remove('fa-close');
			icon.classList.add('fa-bars');
		}
	});
	
	/* Main nav items */
	document.querySelector('.home-btn').addEventListener('click', function() {
		clearSelectedNav();
	});
	
	document.querySelector('.work-btn').addEventListener('click', function() {
		clearSelectedNav();
		document.querySelector('.work-btn').classList.add('selected');
	});
	
	document.querySelector('.about-btn').addEventListener('click', function() {
		clearSelectedNav();
		document.querySelector('.about-btn').classList.add('selected');
	});
	
	document.querySelector('.contact-btn').addEventListener('click', function() {
		clearSelectedNav();
		document.querySelector('.contact-btn').classList.add('selected');
	});
	
	/* Make sure nav is open on large screens */
	window.onresize = function(e) {
		if (e.currentTarget.innerWidth >= 1024) {
			document.querySelector('#menu').classList.remove('closed');
		}
	};
	
	/* Fade the page in */
	document.querySelector('#portfolio-piece').classList.remove('faded');
	document.querySelector('#portfolio-piece').classList.add('fade-in');
	
	/* Fade page out on a work link click */
	var elems = document.querySelectorAll('.nav-btn');
	for (var i = 0; i < elems.length; i++) {
		elems[i].addEventListener('click', fadeNavLink, false); 
	}
});