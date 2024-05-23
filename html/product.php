<?php
	session_start();
	include("../admin/config.php");
	$sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
	$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

	$sql_pro = "SELECT * FROM product WHERE product.category_id='$_GET[id]' ORDER BY product.product_id DESC";
	$query_pro = mysqli_query($mysqli, $sql_pro);

	$sql_cate = "SELECT * FROM category WHERE category.category_id='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
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
					<li><a href="cart.php">Your Cart</a></li>
					<li><a href="product.php">Products</a></li>
					<li>
						<p>
							<form class="search_bar" action="search.php" method="POST">
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

				<div class="product_main_content">
					<h3>Loại sản phẩm: <?php echo $row_title['category_name'] ?></h3>
					<ul class="product_list">
						<?php
							while($row_pro = mysqli_fetch_array($query_pro)){  
						?>
						<li>
							<a href="product-details.php?action=sanpham&id=<?php echo $row_pro['product_id'] ?> ">
								<img src="../images/admin_images/<?php echo $row_pro['product_image'] ?>">
								<p class="product_name">Name: <?php echo $row_pro['product_name'] ?></p>
								<p class="product_price">Price: <?php echo $row_pro['product_price'] ?></p>
							</a>
						</li>
						<?php
						} 
						?>
					</ul>
				</div>

				<div class="product_clear"></div>
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