<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Đồng hồ đeo tay</title>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/home.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<script src="<?= base_url() ?>vendor/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>vendor/js/infiniteslidev2.js"></script>
</head>

<body>
	<?php include '_header.html'; ?>
	<?php include '_signInAndSignUp.html'; ?>
	<?php include '_searchAndCart.html'; ?>
	<div class="banner">
		<ul>
			<li>
				<a href="#_">
					<i class="fa fa-diamond"></i>
					<span>Chất lượng đảm bảo, uy tín hàng đầu</span>
				</a>
			</li>
			<li>
				<a href="#_">
					<i class="fa fa-paper-plane"></i>
					<span>Giao hàng tận nơi</span>
				</a>
			</li>
			<li>
				<a href="#_">
					<i class="fa fa-ticket"></i>
					<span>Hậu mãi cực tốt</span>
				</a>
			</li>
			<li>
				<a href="#_">
					<i class="fa fa-heart"></i>
					<span>Bảo hành dài hạn</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="slider">
		<div class="slide slide-1 slide-show"><a href="#" class="btn">Xem thêm</a></div>
		<div class="slide slide-2"><a href="#" class="btn">Xem thêm</a></div>
		<div class="slide slide-3"><a href="#" class="btn">Xem thêm</a></div>
		<b id="prev">&#10094;</b>
		<b id="next">&#10095;</b>
	</div>
	<div class="main">
		<div class="show-product">
			<p class="title">SẢN PHẨM MỚI</p>
			<div class="products">
				<?php foreach ($rs as $value) { ?>
				<figure class="product product-noscript">
					<a href="<?= base_url('Product_Detail?id=') . $value['id'] ?>">
						<div class="product-img"><img src="<?= base_url() . $value['image'] ?>"></div>
						<figcaption class="product-caption">
							<p class="product-caption-label"><?= $value['name'] ?></p>
							<p class="product-caption-price">
								<?php if (is_null($value['sale'])) {
									echo '<span class="price-new">'.$value["price"].' đồng</span>';
								} else {
									echo '<span class="price-old">'.$value["price"].' đồng</span>
									<span class="price-new">'.$value["price"] * (1 - $value["sale"]).' đồng</span>';
								} ?>
							</p>
						</figcaption>
					</a>
				</figure>
				<?php } ?>
			</div>
		</div>
		<div class="show-product">
			<p class="title">SẢN PHẨM BÁN CHẠY</p>
			<div class="products">
			<?php foreach ($rs as $value) { ?>
				<figure class="product product-noscript">
					<a href="<?= base_url('Product_Detail?id=') . $value['id'] ?>">
						<div class="product-img"><img src="<?= base_url() . $value['image'] ?>"></div>
						<figcaption class="product-caption">
							<p class="product-caption-label"><?= $value['name'] ?></p>
							<p class="product-caption-price">
								<?php if (is_null($value['sale'])) {
									echo '<span class="price-new">'.$value["price"].' đồng</span>';
								} else {
									echo '<span class="price-old">'.$value["price"].' đồng</span>
									<span class="price-new">'.$value["price"] * (1 - $value["sale"]).' đồng</span>';
								} ?>
							</p>
						</figcaption>
					</a>
				</figure>
				<?php } ?>
			</div>
		</div>	
	</div>
	<?php include '_footer.html'; ?>
	<?php include '_noscript.html'; ?>
	<script src="<?= base_url() ?>vendor/js/home.min.js"></script>
</body>

</html>