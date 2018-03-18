<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Đồng hồ đeo tay</title>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/products.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<script src="<?= base_url() ?>vendor/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>vendor/js/jquery-ui.min.js"></script>
</head>

<body>
	<?php include '_header.html'; ?>
	<?php include '_signInAndSignUp.html'; ?>
	<?php include '_searchAndCart.html'; ?>
	<div class="promotion"><img src="<?= base_url(); ?>images/promotion.png"></div>
	<div class="product">
		<div class="product-show">
			<?php foreach ($rs as $key => $value) { 
						if($key == 0) continue; ?>
			<figure class="product-wrapper">
				<div class="product-wrapper-img">
					<img src="<?= base_url() . $value['image'] ?>">
					<span class="product-img-blur"></span>
					<span class="icons">
						<i class="fa fa-cart-plus" title="thêm vào giỏ hàng"></i>
						<a href="<?= base_url('Product_Detail?id=').$value['id']; ?>"><i class="fa fa-eye" title="chi tiết sản phẩm"></i></a>
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
	</div>
	<div class="related-product">
		<p>sản phẩm liên quan</p>
		<div class="related-product-wrapper">
			<a href="#_" class="related-product-img"><img src="<?= base_url(); ?>images/day-da-1.jpg"></a>
			<a href="#_" class="related-product-img"><img src="<?= base_url(); ?>images/day-da-2.jpg"></a>
			<a href="#_" class="related-product-img"><img src="<?= base_url(); ?>images/day-da-3.jpg"></a>
		</div>
	</div>
	<?php include '_footer.html'; ?>
	<?php include '_noscript.html'; ?>
	<script src="<?= base_url() ?>vendor/js/products.min.js"></script>
</body>

</html>