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
	<?php if(!$this->session->has_userdata('user')) redirect('Admin/signin','refresh'); ?>
	<header>
		<a href="<?= base_url() ?>Admin"><img src="<?= base_url('images/logo.png') ?>"></a>
		<form action="<?= base_url('Admin/searchProduct') ?>" method="get">
			<input type="search" placeholder="Tìm kiếm" name="search">
			<button type="submit" name="submit"><i class="fa fa-search"></i></button>
		</form>
		<div class="header-right">
			<div class="filter">
				<div class="switch"><i class="fa fa-filter"></i></div>
				<div class="filter-list panel-black">
					<form  method="get" action="<?= base_url('Admin/advancedSearchProduct') ?>">
						<div class="brands">
							<p>thương hiệu</p>
							<select name="brand">
								<option value="none" selected disabled>--- Chọn một thương hiệu ---</option>
								<option value="casio">Casio</option>
								<option value="citizen">Citizen</option>
								<option value="seiko">Seiko</option>
								<option value="op">OP</option>
								<option value="skagen">Skagen</option>
								<option value="dw">Daniel Wellington (DW)</option>
								<option value="orient">Orient</option>
								<option value="g-shock">G-Shock</option>
								<option value="candino">Candino</option>
								<option value="micheal kors">Micheal Kors</option>
								<option value="fossil">Fossil</option>
								<option value="doxa">Doxa</option>
								<option value="tissot">Tissot</option>
								<option value="longines">Longines</option>
								<option value="movado">Movado</option>
								<option value="sevenfriday">Sevenfriday</option>
								<option value="frederique constant">Frederique Constant</option>
							</select>
						</div>
						<div class="clockworks">
							<p>loại máy</p>
							<select name="clockwork">
								<option value="none" selected disabled>--- Chọn loại máy ---</option>
								<option value="pin (quartz)">Pin (Quartz)</option>
								<option value="tự động (cơ)">Tự động (Cơ)</option>
								<option value="quang">Quang</option>
							</select>
						</div>
						<div class="material">
							<p>chất liệu dây</p>
							<select name="wire">
								<option value="none" selected disabled>--- Chọn chất liệu ---</option>
								<option value="Thép không gỉ">Thép không gỉ</option>
								<option value="Da">Da</option>
								<option value="Nhựa">Nhựa</option>
								<option value="Vải">Vải</option>
							</select>
						</div>
						<div class="styles">
							<p>Kiểu dáng	</p>
							<select name="style">
								<option value="none" selected disabled>--- Chọn kiểu dáng ---</option>
								<option value="Nữ">Nữ</option>
								<option value="Nam">Nam</option>
								<option value="Đôi">Đôi</option>
								<option value="Thể thao">Thể thao</option>
								<option value="Thời trang">Thời trang</option>
							</select>
						</div>
						<div class="prices">
							<p>Giá</p>
							<select name="price">
								<option value="none" selected disabled>--- Chọn mức giá ---</option>
								<option value="lt2">Dưới 2 triệu</option>
								<option value="2-4">2 - 4 triệu</option>
								<option value="4-6">4 - 6 triệu</option>
								<option value="6-8">6 - 8 triệu</option>
								<option value="8-10">8 - 10 triệu</option>
								<option value="gt10">Trên 10 triệu</option>
							</select>
						</div>
						<input type="submit" value="Lọc" name="submit" id="inp-filter">
					</form>
				</div>
			</div>
			<div>
				<a href="<?= base_url('Admin/addProduct') ?>"><i class="fa fa-plus-square" title="thêm sản phẩm"></i></a>
			</div>
			<div class="noti">
				<div class="switch"><i class="fa fa-bell"></i></div>
				<div class="panel-black noti-wrapper">
					<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, architecto quasi quo sequi error unde, obcaecati eum iusto soluta perspiciatis accusantium nostrum voluptate? Atque quia delectus laboriosam nam odit repellendus.</div>
				</div>
			</div>
			<div class="admin">
				<div class="admin-top switch">
					<img src="<?= base_url() ?>/images/user.png">
					<span><?php echo $this->session->userdata('user') ?></span>
				</div>
				<div class="panel-black admin-bottom">
					<p>
						<a href="<?= base_url('Admin/signin?signout') ?>"><i class="fa fa-sign-out"></i>  Đăng xuất</a>
					</p>
				</div>
			</div>
		</div>
	</header>	
	<div class="container">
		<div class="sidebar">
			<!-- <a href="?ref=manage_products" class="sidebar-func active"> -->
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
		<main class="main">
			<div class="product-show">
			<?php foreach ($rs as $key => $value) { 
						if($key == 0) continue; ?>
				<figure class="product-wrapper">
					<div class="product-wrapper-img">
						<img src="<?= base_url() . $value['image'] ?>">
						<span class="product-img-blur"></span>
						<span class="icons">
							<a href="<?php echo base_url() ?>Admin/editProduct/<?= $value['id'] ?>"><i class="fa fa-eye" title="chi tiết sản phẩm"></i></a>
							<a href="<?php echo base_url() ?>Admin/editProduct/<?= $value['id'] ?>"><i class="fa fa-pencil" title="sửa"></i></a>
							<a href="<?php echo base_url() ?>Admin/removeProduct/<?= $value['id'] ?>"><i class="fa fa-times" title="xóa"></i></a>
						</span>
					</div>
					<figcaption class="product-wrapper-caption">
						<p class="label"><?= $value['name'] ?></p>
						<p class="price">
						<?php if (is_null($value['sale'])) {
								echo '<span class="price-new">'.$value["price"].' đồng</span>';
							} else {
								echo '<span class="price-old">'.$value["price"].' đồng</span>
								<span class="price-new">'.$value["price"] * (1 - $value["sale"]).' đồng</span>';
						} ?>
						</p>
					</figcaption>
				</figure>
			<?php } ?>
			</div>
			<div class="pagination">
				<?php for ($i = 1; $i <= $rs[0]; $i++) { 
				echo '<a href="' . base_url("Admin/paginate/$i") . '" class="load-more">' . $i . '</a>';
				} ?>
			</div>
		</main>
	</div>
	<script src="<?= base_url('vendor/js/manage_products.min.js') ?>"></script>
</body>
</html>