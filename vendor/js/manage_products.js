window.addEventListener('load', function(e) {
	$('.switch').click(function() {
		$('.switch').not($(this)).removeClass('clicked').next().hide('fast');
		$(this).toggleClass('clicked').next().toggle('fast');
	});
	/** prevent input filter submits when there is none valid select */
	document.getElementById('inp-filter').addEventListener('click', function(e) {
		let values = [], i = 0;
		document.querySelectorAll('select').forEach(function(el){
			values.push(el.value);
		});
		values.forEach(function(val){
			if(val == 'none') i++;
		});
		if(i == 5) e.preventDefault();
	});
	document.querySelectorAll('.fa-times').forEach(function(el){
		el.addEventListener('click', function(e) {
			if (!confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) e.preventDefault();
		});
	});
}, false);