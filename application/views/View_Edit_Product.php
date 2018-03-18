<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lí - Sửa sản phẩm</title>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/admin.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/edit_product.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<script src="<?= base_url() ?>vendor/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php if(!$this->session->has_userdata('user')) redirect('signin','refresh'); ?>
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
			<h3>Sửa thông tin sản phẩm</h3><hr>
			<div class="detail">
				<form action="<?php echo base_url('Admin/updateProduct') ?>" method="post" enctype="multipart/form-data" class="form">
					<?php foreach ($rs as $value) { ?>
					<div class="form-product">
						<div class="form-product-col">
							<p>
								<span>Tên sản phẩm</span>
								<input type="text" name="name" value="<?= $value['name'] ?>" class="required" required>
							</p>
							<p>
								<span>Mặt kính</span>
								<input type="text" name="glass" value="<?= $value['glass'] ?>" class="required" required>
							</p>
							<p>
								<span>Đường kính mặt</span>
								<input type="text" name="diameter" value="<?= $value['diameter'] ?>" class="required" required>
							</p>
							<p>
								<span>Độ dày</span>
								<input type="text" name="thickness" value="<?= $value['thickness'] ?>" class="required" required>
							</p>
							<p>
								<span>Chống nước</span>
								<input type="text" name="waterproof" value="<?= $value['waterproof'] ?>" class="required" required>
							</p>
							<p>
								<span>Bảo hành</span>
								<input type="text" name="guarantee" value="<?= $value['guarantee'] ?>" class="required" required>
							</p>
							<p>
								<span>Giá</span>
								<input type="text" name="price" value="<?= $value['price'] ?>" class="required" required>
							</p>
							<p>
								<span>Khuyến mại</span>
								<input type="text" name="sale" value="<?php if(!empty($value['sale'])) echo $value['sale'] ?>">
							</p>
						</div>
						<div class="form-product-col">
							<p>
								<span>Thương hiệu</span>
								<select name="brand">
									<?php $brands = ['candino','casio','citizen','seiko','op','daniel wellington (dw)','skagen','g-shock & baby-g','orient','micheal kors','fossil','doxa','tissot','longines','movado','sevenfriday','frederique constant'];
									foreach ($brands as $value2) {
										if($value2 == $value['id_brand']) echo "<option value='$value2' selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Xuất xứ</span>
								<select name="origin">
									<?php $origins = ['Thụy Sỹ','Nhật Bản','Mĩ','Đan Mạch','Thụy Điển'];
									foreach ($origins as $value2) {
										if($value2 == $value['id_origin']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Màu sắc</span>
								<select name="color">
									<?php $colors = ['trắng', 'vàng', 'đen', 'hồng'];
									foreach ($colors as $value2) {
										if($value2 == $value['id_color']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Kiểu dáng</span>
								<select name="style">
									<?php $styles = ['nam', 'nữ', 'đôi', 'thời trang', 'thể thao'];
									foreach ($styles as $value2) {
										if($value2 == $value['style']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Bộ máy</span>
								<select name="clockwork">
									<?php $clockworks = ['pin (quartz)', 'tự động (cơ)', 'quang'];
									foreach ($clockworks as $value2) {
										if($value2 == $value['clockwork']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Chất liệu dây</span>
								<select name="wire">
									<?php $wires = ['da', 'thép không gỉ', 'vải', 'nhựa'];
									foreach ($wires as $value2) {
										if($value2 == $value['wire']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Chất liệu vỏ</span>
								<select name="case">
									<?php $cases = ['thép không gỉ', 'nhựa'];
									foreach ($cases as $value2) {
										if($value2 == $value['case']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
							<p>
								<span>Nhà cung cấp</span>
								<select name="provider">
									<?php $providers = ['đại lí Hải Triều', 'đại lí Đức Hùng', 'đại lí Hiếu Tín'];
									foreach ($providers as $value2) {
										if($value2 == $value['id_provider']) echo "<option value='$value2'  selected>$value2</option>";
										else echo "<option value='$value2'>$value2</option>";
									} ?>
								</select>
							</p>
						</div>
						<div class="form-product-col">
							<div class="product-image">
								<img src="<?= base_url() . $value['image'] ?>" alt="Ảnh sản phẩm">
								<input type="hidden" name="image_old" value="<?= $value['image'] ?>">
							</div>
							<input type="file" name="image_new" id="image_new">
						</div>
					</div>
					<div class="form-submit">
						<input type="hidden" name="id" value="<?= $value['id'] ?>">
						<input type="submit" value="Lưu" name="submit">
						<a href="../">Hủy</a>
					</div>
					<?php } ?>
				</form>
			</div>
		</main>
	</div>
	<script src="<?= base_url() ?>vendor/js/manage_products.min.js"></script>
	<script>
		window.addEventListener('load', function(e) {
			document.querySelectorAll('.required').forEach(function(el) {
				el.addEventListener('invalid', function(e) {
					this.setCustomValidity('không được bỏ trống trường này');
				});
				el.addEventListener('input', function(e) {
					this.setCustomValidity('');
				});	
			});
		});
	</script>
</body>
</html>