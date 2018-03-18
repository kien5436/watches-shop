<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lí - Quản lí sản phẩm</title>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/admin.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<script src="<?= base_url() ?>vendor/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<header>
		<a href="<?= base_url() ?>Admin"><img src="<?= base_url('images/logo.png') ?>"></a>
		<form action="" method="get">
			<input type="search" placeholder="Tìm kiếm" name="search">
			<button type="submit" name="submit"><i class="fa fa-search"></i></button>
		</form>
		<div class="header-right">
			<div class="filter">
				<div class="switch"><i class="fa fa-filter"></i></div>
				<form class="panel-black filter-list" method="get" action="">
					<div class="brand">
						<p>thương hiệu</p>
						<select name="brand-selected" id="brand-selected">
							<option value="none" selected disabled>--- Chọn một thương hiệu ---</option>
							<option value="casio">Casio</option>
							<option value="citizen">Citizen</option>
							<option value="seiko">Seiko</option>
							<option value="op">OP</option>
							<option value="skagen">Skagen</option>
							<option value="dw">DW</option>
							<option value="orient">Orient</option>
							<option value="gshock">G-Shock</option>
							<option value="candino">Candino</option>
							<option value="kors">Micheal Kors</option>
							<option value="fossil">Fossil</option>
							<option value="doxa">Doxa</option>
							<option value="tissot">Tissot</option>
							<option value="longines">Longines</option>
							<option value="movado">Movado</option>
							<option value="7-6">Sevenfriday</option>
							<option value="fc">Frederique Constant</option>
						</select>
					</div>
					<div class="clockwork">
						<p>loại máy</p>
						<select name="clockwork-selected" id="clockwork-selected">
							<option value="none" selected disabled>--- Chọn loại máy ---</option>
							<option value="quartz">Pin (Quartz)</option>
							<option value="auto">Tự động (Cơ)</option>
							<option value="solar">Quang</option>
						</select>
					</div>
					<div class="material">
						<p>chất liệu dây</p>
						<select name="material-selected" id="material-selected">
							<option value="none" selected disabled>--- Chọn chất liệu ---</option>
							<option value="ss">Thép không gỉ</option>
							<option value="leather">Da</option>
							<option value="plastic">Nhựa</option>
							<option value="cloth">Vải</option>
						</select>
					</div>
					<div class="style">
						<p>Kiểu dáng	</p>
						<select name="style-selected" id="style-selected">
							<option value="none" selected disabled>--- Chọn kiểu dáng ---</option>
							<option value="female">Nữ</option>
							<option value="male">Nam</option>
							<option value="couple">Đôi</option>
							<option value="sport">Thể thao</option>
							<option value="fashion">Thời trang</option>
						</select>
					</div>
					<div class="price">
						<p>Giá</p>
						<select name="price-selected" id="price-selected">
							<option value="none" selected disabled>--- Chọn mức giá ---</option>
							<option value="lt2">Dưới 2 triệu</option>
							<option value="2-4">2 - 4 triệu</option>
							<option value="4-6">4 - 6 triệu</option>
							<option value="6-8">6 - 8 triệu</option>
							<option value="8-10">8 - 10 triệu</option>
							<option value="gt10">Trên 10 triệu</option>
						</select>
					</div>
					<input type="submit" value="Lọc" name="submit">
				</form>
			</div>
			<div><div class="switch">
				<a href="<?= base_url() ?>Admin/addProduct"><i class="fa fa-plus-square" title="thêm sản phẩm"></i></a>
			</div></div>
			<div class="noti">
				<div class="switch"><i class="fa fa-bell"></i></div>
				<div class="panel-black noti-wrapper">
					<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, architecto quasi quo sequi error unde, obcaecati eum iusto soluta perspiciatis accusantium nostrum voluptate? Atque quia delectus laboriosam nam odit repellendus.</div>
				</div>
			</div>
			<div class="admin">
				<div class="admin-top switch">
					<img src="<?= base_url() ?>/images/user.png">
					<span></span>
				</div>
				<div class="panel-black admin-bottom">
					<p><i class="fa fa-sign-out"></i>  Đăng xuất</p>
				</div>
			</div>
		</div>
	</header>	
	<div class="container">
		<div class="sidebar">
			<a href="<?= base_url('Admin') ?>" class="sidebar-func active">
				<i class="fa fa-clock-o"></i>
				<span>Quản lí sản phẩm</span>
			</a>
			<a href="<?= base_url('Admin/cuminsoon') ?>" class="sidebar-func">
				<i class="fa fa-address-book-o"></i>
				<span>Quản lí tài khoản</span>
			</a>
			<a href="<?= base_url('Admin/cuminsoon') ?>" class="sidebar-func">
				<i class="fa fa-hashtag"></i>
				<span>Quản lí<br>nội dung khác</span>
			</a>
			<a href="<?= base_url('Admin/cuminsoon') ?>" class="sidebar-func">
				<i class="fa fa-bar-chart"></i>
				<span>Báo cáo thống kê</span>
			</a>
			<div class="sidebar-to-left"><i class="fa fa-chevron-left"></i></div>
		</div>
		<main class="main main-empty">cooming soon</main>
	</div>
	<script src="<?= base_url() ?>vendor/js/manage_products.min.js"></script>
</body>
</html>