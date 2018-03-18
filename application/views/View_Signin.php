<div></div><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<style>
		* {margin: 0; padding: 0;}
		body {
			background: url(<?= base_url('images/bg-admin.png') ?>) 0 0 no-repeat;
			-webkit-background-size: cover;
			background-size: cover;
		}
		form {
			border: 1px solid #ccc;
			background: rgba(0,0,0,.5);
			font-family: sans-serif;
			margin: 10% auto;
			padding: 3%;
			width: 50%;
		}
		input {
			background: transparent;
			border: none;
			border-bottom: 1px solid #ccc;
			color: #fff;
			font-size: 1.2em;
			margin: 3% auto;
			padding: 1%;
			width: 100%;
		}
		input[type=submit] {
			background: rgba(255, 255, 255, .5);
			border: 1px solid black;
			color: #000;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<form action="/kien/watch/admin/signin" method="post">
		<input type="text" name="user" class="inp" placeholder="Tên đăng nhập" autofocus required>
		<input type="password" name="pwd" class="inp" placeholder="Mật khẩu" required>
		<input type="submit" value="Đăng nhập" name="submit" id="submit">
	</form>
	<script>
		window.addEventListener('load', function(e) {
			document.getElementById('submit').addEventListener('click', function(e) {
				// modern browsers
				document.querySelectorAll('.inp').forEach(function(el){
					el.addEventListener('invalid', function(e) {
						if(this.name == 'user')
							this.setCustomValidity('Chưa điền tên đăng nhập');
						else
							this.setCustomValidity('Chưa điền mật khẩu');
					});
					el.addEventListener('input', function(e) {
						this.setCustomValidity('');
					});
				});
			});
		}, false);
	</script>
</body>
</html>