$(function() {
	/** detect browser */
	var ua = navigator.userAgent.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i),
		browser;
	if (navigator.userAgent.match(/Edge/i) || navigator.userAgent.match(/Trident.*rv[ :]*11\./i)) {
		browser = "msie";
	} else {
		browser = ua[1].toLowerCase();
	}
	/**
	 * [scrollTo scroll to top]
	 * @param  {[type]} el       [scrolled element]
	 * @param  {[type]} to       [position to scroll]
	 * @param  {Number} duration [time to scroll]
	 */
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

	/**
	 * [slideShow description]
	 * @param  {[type]} button [description]
	 */
	var slides = document.getElementsByClassName('slide'),
		currentPos = 0,
		isMoving = false;

	function slideShow(button) {
		let class1, class2;
		if (button.id == 'next') {
			class1 = 'slideRight1', class2 = 'slideRight2';
		} else {
			class1 = 'slideLeft1', class2 = 'slideLeft2';
		}
		if (!isMoving) {
			isMoving = true;
			let count = 0;
			slides[currentPos].classList.add(class1);
			slides[currentPos].addEventListener('animationend', function() {
				this.classList.remove('slide-show');
				this.classList.remove(class1);
				count++;
				if (count == 2) isMoving = false;
			});
			if (button.id === 'next') {
				currentPos++;
				if (currentPos == slides.length) currentPos = 0;
			} else {
				currentPos--;
				if (currentPos < 0) currentPos = slides.length - 1;
			}
			slides[currentPos].classList.add(class2);
			slides[currentPos].addEventListener('animationend', function(e) {
				this.classList.add('slide-show');
				this.classList.remove(class2);
				count++;
				if (count == 2) isMoving = false;
			});
		}
	}

	document.getElementById('prev').addEventListener('click', function() {
		slideShow(this);
	});
	document.getElementById('next').addEventListener('click', function() {
		slideShow(this);
	});
	setInterval(function() {
		slideShow(document.getElementById('next'));
	}, 5000);

	/*** infinity slide show */
	$('.product').removeClass('product-noscript');
	$('.products').css('overflow', 'initial').infiniteslide();

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
	/*** show or hide 'search-form-advanced'	 */
	$('.search-form-advanced-toggle').click(function() {
		document.getElementById('inp-search').disabled = (document.getElementById('inp-search').disabled == 1 ? 0 : 1);
		$('#search-form').toggleClass('extend');
		$(this).children('.fa').toggleClass('rotation');
		$('.search-form-advanced').toggle(300);
	});
	/** check if cart is empty or not
	 * if the quantity of goods is greater than 1, adjust top position
	 * */
	// (function adjustCartInfo() {
	// 	if (document.getElementsByClassName('cart-info-scroll')[0].children.length) {
	// 		document.getElementsByClassName('cart-info-empty')[0].style.display = 'none';
	// 		document.getElementsByClassName('cart-info-wrapper')[0].style.display = 'block';
	// 		if (document.getElementsByClassName('cart-info-scroll')[0].children.length > 1) $('.cart-info').addClass('extend');
	// 	} else {
	// 		document.getElementsByClassName('cart-info-empty')[0].style.display = 'block';
	// 		document.getElementsByClassName('cart-info-wrapper')[0].style.display = 'none';
	// 		document.getElementsByClassName('btn-checkout')[0].classList.add('btn-disabled');
	// 		document.getElementsByClassName('btn-remove-all')[0].classList.add('btn-disabled');
	// 	}
	// })();

	// var btnRemoves = document.getElementsByClassName('fa-remove');
	// for (let i = 0, len = btnRemoves.length; i < len; i++) {
	// 	btnRemoves[i].addEventListener('click', function() {
	// 		this.parentNode.parentNode.removeChild(this.parentNode);
	// 		adjustCartInfo();
	// 	});
	// }
	// document.getElementsByClassName('btn-remove-all')[0].addEventListener('click', function() {
	// 	this.parentNode.removeChild(this.parentNode.getElementsByClassName('cart-info-wrapper')[0]);
	// 	adjustCartInfo();
	// });

	// document.getElementsByClassName('call-sign')[0].addEventListener('click', function(e) {
	// 	document.getElementsByClassName('sign-wrapper')[0].classList.add('sign-wrapper-show');
	// });
	// document.getElementsByClassName('call-sign')[1].addEventListener('click', function(e) {
	// 	document.getElementsByClassName('sign-wrapper')[1].classList.add('sign-wrapper-show');
	// });

});
