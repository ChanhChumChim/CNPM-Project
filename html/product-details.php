<?php 
	include("../admin/config.php");
	$sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
	$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

	$sql_chitiet = "SELECT * FROM product,category WHERE product.category_id = category.category_id AND product.product_id = '$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="../images/favicon.png">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
		<title>E-Cart | Sàn thương mại điện tử số 1 VI </title>
	</head>

	<body>
		<header>
			<nav class="navbar">
				<ul>
					<li class="Logo"><a href="index.php"><img src="../images/favicon.png" alt="logo"></a></li>
					<?php
					 	if(isset($_SESSION['user_name'])){
					?>
					 	<li><a href="../php/sign_out.php">Sign Out</a></li>
					<?php
						}else{ 
					?>
						<li><a href="sign.html">Sign In</a></li>
					<?php
						}  
					?>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="cart.php">Your Cart</a></li>
					<li><a href="product.php">Products</a></li>
					<li>
						<p>
							<form action="search.php" method="POST">
								<input type="text" placeholder="Search..." name="keyword">
								<input type="submit" name="search" value="Go">
							</form>
						</p>
					</li>
				</ul>
			</nav>
		</header>

		<main>
			<div class="product_body_wrapper">
				<div class="product_sidebar">
					<ul class="category_list">
						<?php 
							while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
						?>
						<li><a href="product.php?action=danhmucsanpham&id=<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>

				<div class="product_details_main_content">
					<?php
						while($row_chitiet = mysqli_fetch_array($query_chitiet)){
					?>
					<div class="product_details_wrapper">
						<div class="product_details_product_image">
							<img width="80%" src="../images/admin_images/<?php echo $row_chitiet['product_image'] ?>">
						</div>
						<form action="add-to-cart.php?idsanpham=<?php echo $row_chitiet['product_id'] ?> " method="POST">
							<div class="product_details_information">
								<h3><?php echo $row_chitiet['product_name'] ?></h3>
								<p>Giá sản phẩm: <?php echo $row_chitiet['product_price'] ?></p>
								<p>Số lượng sản phẩm: <?php echo $row_chitiet['amount'] ?></p>
								<p>Thể loại: <?php echo $row_chitiet['category_name'] ?></p>
								<p>Tình trạng: <?php if($row_chitiet['status'] == 0) {
									                echo 'Mới';
									            } else {
									                echo 'Đã qua sử dụng';
									            }
									            ?>
								</p>
								<p>Đánh giá chung: <?php echo $row_chitiet['noidung'] ?></p>
								<p><input class="add_to_cart" name="add-to-cart" type="submit" value="Thêm vào giỏ hàng"></p>
							</div>
						</form>
					</div>
					<?php
					} 
					?>
				</div>

				<div class="product_details_clear"></div>
			</div>
		</main>

		<footer>
			<div class="wrapper1">
				<div class="box info">
					<h2 class="title">E-cart</h2>
					<p>E-cart is an innovative ecommerce platform designed to revolutionize the way people shop. It specializes in selling technological appliances. Our platform addresses the common challenges faced by modern shoppers, including time constraints, limited choices, accessibility issues, and difficulty in decision-making.</p>
					<ul class="icons">
						<li>
							<a href="#"><i class="fab fa-github"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-x-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-linkedin-in"></i></a>
						</li>
					</ul>
				</div>
				<div class="box links">
					<h2>Company</h2>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Our Teams</a></li>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Career</a></li>
				</div>
				<div class="box links">
					<h2>Quick Links</h2>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Refund Policy</a></li>
					<li><a href="#">Cookies Policy</a></li>
				</div>
				<div class="box contact">
					<h2>Contact Us</h2>
					<ul>
						<li>
							<span><i class="fas fa-phone"></i></span>
							<p><a href="#">+0123456789</a></p>
						</li>
						<li>
							<span><i class="fas fa-envelope"></i></span>
							<p><a href="#">developmentteam@ecart.com</a></p>
						</li>
					</ul>
				</div>
				<div class="copyright">
					Copyright &copy; E-cart. All Right Reserved.
				</div>
			</div>
		</footer>
	</body> 
</html>