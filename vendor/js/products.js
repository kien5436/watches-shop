window.addEventListener('load', function(e) {
	/** those codes are repeated from home.js */
	function scrollTo(el, to, duration = 300) {
		if (duration <= 0) return;
		let difference = to - el.scrollTop;
		let perTick = difference / duration * 10;

		setTimeout(function() {
			el.scrollTop = el.scrollTop + perTick;
			if (el.scrollTop == to) return;
			scrollTo(el, to, duration - 10);
		}, 10);
	}

	window.addEventListener('scroll', function() {
		if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			document.getElementsByClassName('fa-angle-double-up')[0].classList.add('show-back-to-top');
			document.getElementsByClassName('header-bottom')[0].classList.add('sticky');
		} else {
			document.getElementsByClassName('fa-angle-double-up')[0].classList.remove('show-back-to-top');
			document.getElementsByClassName('header-bottom')[0].classList.remove('sticky');
		}
	});

	document.getElementsByClassName('fa-angle-double-up')[0].addEventListener('click', function() {
		scrollTo(document.body, 0);
		scrollTo(document.documentElement, 0); // firefox
	});
	
	for (let i = 0; i < document.getElementsByClassName('switch').length; i++) {
		/*** show or hide popups beside page	 */
		document.getElementsByClassName('switch')[i].addEventListener('click', function() {
			for (let i = 0; i < document.getElementsByClassName('switch').length; i++) {
				if (document.getElementsByClassName('switch')[i] == this) continue;
				document.getElementsByClassName('switch')[i].nextElementSibling.classList.remove('show-up');
			}
			this.nextElementSibling.classList.toggle('show-up');
		});
		document.getElementsByClassName('btn-close')[i].addEventListener('click', function() {
			this.parentNode.classList.remove('show-up');
		});
	}

	$('.search-form-advanced-toggle').click(function() {
		document.getElementById('inp-search').disabled = (document.getElementById('inp-search').disabled == 1 ? 0 : 1);
		$('#search-form').toggleClass('extend');
		$(this).children('.fa').toggleClass('rotation');
		$('.search-form-advanced').toggle(300);
	});

	/** those codes are defined for this page */
	/**
	 * [currentPage - get current page to add class selected to link]
	 */
	var regexp = /[\/+\?]/, currentPage = window.location.href.split(regexp)[5];
	document.querySelectorAll('.parent-link').forEach(function(el){
		el.classList.remove('selected');
		if(el.getAttribute('data-href') == currentPage) el.classList.add('selected');
	});
});