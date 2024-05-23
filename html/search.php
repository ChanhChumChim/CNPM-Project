<?php
	include("../admin/config.php");
	if(isset($_POST['search'])){
		$tukhoa = $_POST['keyword'];
	} 
	$sql_pro = "SELECT * FROM product, category WHERE product.category_id=category.category_id AND product.product_name LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysqli,$sql_pro);
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
			<div class="index_body_wrapper">
				<h3>Hiển thị tất cả sản phẩm chứa từ khóa: <?php echo $_POST['keyword']; ?></h3>
				<ul class="index_product_list">
					<?php
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
					<li>
						<a href="#">
							<img src="../images/admin_images/<?php echo $row['product_image'] ?>">
							<p class="product_name">Tên sản phẩm: <?php echo $row['product_name'] ?></p>
							<p class="product_price">Giá sản phẩm: <?php echo $row['product_price'] ?></p>
							<p style="text-align: center; color: #000;">Loại sản phẩm: <?php echo $row['category_name'] ?></p>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
				<div class="index_clear"></div>
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