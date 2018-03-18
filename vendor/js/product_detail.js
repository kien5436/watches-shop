window.addEventListener('load', function(e) {
	/** via home.js */
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

	/** its own js */
	var evt = new Event(), m = new Magnifier(evt);
	m.attach({
		thumb: '#thumb',
		zoom: 3,
		zoomable: true
	});

	document.querySelectorAll('.product-img-list img').forEach(function(el){
		el.addEventListener('click', function() {
			document.getElementsByClassName('product-img-big')[0].src = this.src;
			document.getElementsByClassName('product-img-big')[0].setAttribute('data-large-img-url', this.src);
			document.getElementById('thumb-lens').style.backgroundImage = 'url(' + this.src + ')';
			document.getElementById('thumb-large').src = this.src;
		});
	});

	document.querySelectorAll('.tab-title').forEach(function(el) {
		el.addEventListener('click', function() {
			if (document.getElementsByClassName('tab-review-wrapper')[0].childElementCount) {
				this.style.borderTop = '2px solid #000';
				document.getElementsByClassName('tab-review-wrapper')[0].style.display = 'block';
				document.getElementsByClassName('tab-review-none')[0].style.display = 'none';
			} 
			// else {
			// 	this.style.borderTop = 'unset';
			// 	document.getElementsByClassName('tab-review-wrapper')[0].style.display = 'none';
			// 	document.getElementsByClassName('tab-review-none')[0].style.display = 'block';
			// }
			document.querySelectorAll('.tab-content').forEach(function(el) {
				el.classList.remove('show');
			});
			this.nextElementSibling.classList.add('show');
		});
	});
}, false);