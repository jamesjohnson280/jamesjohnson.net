/* Returns true if an element is visible in the browser window */
function isElementVisible(el) {
	'use strict';
    var rect     = el.getBoundingClientRect();
    var vWidth   = window.innerWidth || document.documentElement.clientWidth;
    var vHeight  = window.innerHeight || document.documentElement.clientHeight;
    var efp      = function(x, y) { return document.elementFromPoint(x, y); };     

    /* Return false if it's not in the viewport */
    if (rect.right < 0 || rect.bottom < 0 || rect.left > vWidth || rect.top > vHeight) {
        return false;
	}

    /* Return true if any of its four corners are visible */
    return (el.contains(efp(rect.left,  rect.top)) || 
			el.contains(efp(rect.right, rect.top)) || 
			el.contains(efp(rect.right, rect.bottom)) || 
			el.contains(efp(rect.left,  rect.bottom)));
}

/* Clears the selected nav item in the main menu */
function clearSelectedNav() {
	'use strict';
	var elems = document.querySelectorAll('.nav-btn');
	for (var i = 0; i < elems.length; i++) {
		elems[i].classList.remove('selected');
	}
}

/* Fades out the work panel when user clicks on a work link */
function fadeWorkLink(e) {
	'use strict';
	e.preventDefault();
	document.querySelector('#work').classList.add('fade-out');
	var loc = this.href;
	document.querySelector('#work').addEventListener('transitionend', function() {
		window.location = loc;
	});
}

/* Check which items are in view and selects the proper nav item */
function updateNav() {
	'use strict';
	if (isElementVisible(document.querySelector('#home h1'))) {
		clearSelectedNav();
	} else if (isElementVisible(document.querySelector('#work-title'))) {
		clearSelectedNav();
		document.querySelector('.work-btn').classList.add('selected');
	} else if (isElementVisible(document.querySelector('#about-title'))) {
		clearSelectedNav();
		document.querySelector('.about-btn').classList.add('selected');
	} else if (isElementVisible(document.querySelector('#contact-title'))) {
		clearSelectedNav();
		document.querySelector('.contact-btn').classList.add('selected');
	}
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
		if (history.pushState) {
			history.pushState(null, null, '#home');
		}
		document.querySelector('#home').scrollIntoView({ 
			behavior: 'smooth',
			block: 'start'
		});
	});
	
	document.querySelector('.work-btn').addEventListener('click', function() {
		clearSelectedNav();
		if (history.pushState) {
			history.pushState(null, null, '#work');
		}
		document.querySelector('.work-btn').classList.add('selected');
		document.querySelector('#work').scrollIntoView({ 
			behavior: 'smooth',
			block: 'start'
		});
	});
	
	document.querySelector('.about-btn').addEventListener('click', function() {
		clearSelectedNav();
		if (history.pushState) {
			history.pushState(null, null, '#about');
		}
		document.querySelector('.about-btn').classList.add('selected');
		document.querySelector('#about').scrollIntoView({ 
			behavior: 'smooth',
			block: 'start'
		});
	});
	
	document.querySelector('.contact-btn').addEventListener('click', function() {
		clearSelectedNav();
		if (history.pushState) {
			history.pushState(null, null, '#contact');
		}
		document.querySelector('.contact-btn').classList.add('selected');
		document.querySelector('#contact').scrollIntoView({ 
			behavior: 'smooth',
			block: 'start'
		});
	});
	
	/* Below the fold */
	
	/* Select nav item based on what's in view */
	updateNav();
	
	/* Select correct nav item if there is a hash tag in the nav */
	var hash = window.location.hash.substr(1);
	if (hash === 'work') {
		clearSelectedNav();
		document.querySelector('.work-btn').classList.add('selected');
	} else if (hash === 'about') {
		clearSelectedNav();
		document.querySelector('.about-btn').classList.add('selected');
	} else if (hash === 'contact') {
		clearSelectedNav();
		document.querySelector('.contact-btn').classList.add('selected');
	}
	
	/* Change nav as user scrolls page */
	window.onscroll = updateNav;
	
	/* Make sure nav is open on large screens */
	window.onresize = function(e) {
		if (e.currentTarget.innerWidth >= 1024) {
			document.querySelector('#menu').classList.remove('closed');
		}
	};
	
	/* Fade the page in on load*/
	document.querySelector('#main').classList.remove('faded');
	document.querySelector('#main').classList.add('fade-in');
	
	/* Fade page out on a work link click */
	var elems = document.querySelectorAll('.work-link');
	for (var i = 0; i < elems.length; i++) {
		elems[i].addEventListener('click', fadeWorkLink, false); 
	}
});
