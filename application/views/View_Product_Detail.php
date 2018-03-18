<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Đồng hồ đeo tay</title>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/product_detail.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/css/magnifier.css">
	<script src="<?= base_url() ?>vendor/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>vendor/js/Event.js"></script>
	<script src="<?= base_url() ?>vendor/js/Magnifier.js"></script>
	<style>
		#preview {
			position: absolute;
			width: 400px;
			height: 400px;
			top: 25%;
			left: 38%;
			z-index: -1;
		}
		.magnifier-thumb-wrapper:hover + #preview	{z-index: 10}
	</style>
</head>

<body>
	<?php include '_header.html'; ?>
	<?php include '_signInAndSignUp.html'; ?>
	<?php include '_searchAndCart.html'; ?>
	<main class="main">
		<div class="main-left">
			<div class="product">
				<div class="product-img">
					<a class="magnifier-thumb-wrapper">
						<img src="<?= $rs[0]['image'] ?>" class="product-img-big" id="thumb" data-large-img-url="<?= $rs[0]['image'] ?>" data-large-img-wrapper="preview">
					</a>
					<div class="magnifier-preview" id="preview"></div>
					<div class="product-img-list">
						<img src="<?= $rs[0]['image'] ?>">
					</div>
				</div>
				<div class="product-description">
					<p>Thông tin sản phẩm</p>
					<p>Tên sản phẩm: <span class="txt-bold"><?= $rs[0]['name'] ?></span></p>
					<p> Giá:	
					<?php if (is_null($rs[0]['sale'])) {
							echo '<span class="price-new txt-bold">'.$rs[0]["price"].' đồng</span>';
						} else {
							echo '<span class="price-old">'.$rs[0]["price"].' đồng</span>
							<span class="price-new txt-bold">'.$rs[0]["price"] * (1 - $rs[0]["sale"]).' đồng</span>';
					} ?>
					</p>
					<p>Số lượng: <input type="number" name="inp-num" id="inp-num	" value="1" min="1"></p>
					<button type="submit" class="btn btn-add-to-cart"><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</button>
					<p>Từ khóa: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum ipsa, quis dolorum!</p>
				</div>
			</div>
			<div class="tab">
				<p class="tab-title">Chi tiết sản phẩm</p>
				<div class="tab-content show">
					<table>
						<tr>
							<td>Mã sản phẩm</td>
							<td><?= $rs[0]['id'] ?></td>
						</tr>
						<tr>
							<td>Tên sản phẩm</td>
							<td><?= $rs[0]['name'] ?></td>
						</tr>
						<tr>
							<td>Thương hiệu</td>
							<td><?= $rs[0]['id_brand'] ?></td>
						</tr>
						<tr>
							<td>Xuất xứ</td>
							<td><?= $rs[0]['id_origin'] ?></td>
						</tr>
						<tr>
							<td>Kiểu dáng</td>
							<td><?= $rs[0]['style'] ?></td>
						</tr>
						<tr>
							<td>Màu sắc</td>
							<td><?= $rs[0]['id_color'] ?></td>
						</tr>
						<tr>
							<td>Bộ máy</td>
							<td><?= $rs[0]['clockwork'] ?></td>	
						</tr>
						<tr>
							<td>Chất liệu dây</td>
							<td><?= $rs[0]['wire'] ?></td>
						</tr>
						<tr>
							<td>Chất liệu vỏ</td>
							<td><?= $rs[0]['case'] ?></td>
						</tr>
						<tr>
							<td>Mặt kính</td>
							<td><?= $rs[0]['glass'] ?></td>
						</tr>
						<tr>
							<td>Đường kính mặt</td>
							<td><?= $rs[0]['diameter'] ?></td>
						</tr>
						<tr>
							<td>Độ dày</td>
							<td><?= $rs[0]['thickness'] ?></td>
						</tr>
						<tr>
							<td>Chống nước</td>
							<td><?= $rs[0]['waterproof'] ?></td>
						</tr>
						<tr>
							<td>Bảo hành</td>
							<td><?= $rs[0]['guarantee'] ?></td>
						</tr>
					</table>
				</div>
				<p class="tab-title">Đánh giá</p>
				<div class="tab-content">
					<div class="tab-review-none">Chưa có đánh giá nào</div>
					<div class="tab-review-wrapper">
						<div class="user-reviewed">
							<p class="user-reviewed-info">
								<span class="username">Nguyen Van A</span>
								<span class="publish-time">vào ngày 31 July 2017</span>
							</p>
							<p class="user-reviewed-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ut esse pariatur cupiditate ad distinctio, nemo dignissimos dolorum non alias ipsa exercitationem rerum perferendis enim temporibus voluptatum eum ab nisi facilis necessitatibus blanditiis eaque. Molestiae nisi debitis facere totam non iure impedit ad iusto enim quia, accusantium asperiores aliquid. Asperiores perspiciatis illo laborum eligendi ut tempora cupiditate voluptatem inventore quidem velit. Suscipit, accusamus ab dicta! Unde iusto, laudantium maiores. Eligendi sunt illum quisquam! A modi saepe autem earum suscipit iste assumenda, repellat. Facere ipsam officiis, saepe, numquam explicabo praesentium tempora ea officia enim maxime possimus doloremque molestias quia pariatur aut?</p>
						</div>
					</div>
					<form class="user-review">
						<p>Đánh giá của bạn</p>
						<textarea name="user-review-content" id="user-review-content" placeholder="Viết đánh giá tại đây (không quá 1000 từ)"></textarea>
						<input type="submit" class="btn" rs[0]="Gửi nhận xét">
					</form>
				</div>
			</div>
		</div>
		<div class="main-right">
			<div class="related-product">
				<p>sản phẩm cùng loại</p>
				<div class="related-product-wrapper">
					<a href="#" class="related-product-img">
						<img src="<?= base_url() ?>images/5aa655d26dcd43.02193324.jpg">
						<p>
							<span>Đồng hồ Orient FUNG6003W0 Nữ Pin Dây Da</span>
							<span>2.000.000 đồng</span>
						</p>
					</a>
					<a href="#" class="related-product-img">
						<img src="<?= base_url() ?>images/5aa87f4d2b45d3.03945034.jpg">
						<p>
							<span>Đồng hồ Orient FUNG6003W0 Nữ Pin Dây Da</span>
							<span>2.000.000 đồng</span>
						</p>
					</a>
				</div>
			</div>
		</div>
	</main>
	<?php include '_footer.html'; ?>
	<?php include '_noscript.html'; ?>
	<script src="<?= base_url() ?>vendor/js/product_detail.min.js"></script>
</body>

</html>