<?php
	session_start(); 
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
			<p> Here is your cart: 
				<?php
					if(isset($_SESSION['user_name'])){
						echo $_SESSION['user_name'];
					} 
				?>
			</p>

			<button style="margin-bottom: 10px;">
				<a href="product.php">Back to products page</a>
			</button>

			<table style="width: 100%; text-align: center;" border="1">
				<tr>
					<th>ID</th>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Amount Ordered</th>
					<th>Price per Unit</th>
					<th>Final Price</th>
					<th>Manager</th>
				</tr>
				<?php
					if(isset($_SESSION['cart'])){
						$i = 0;
						$tongtien = 0;
						foreach($_SESSION['cart'] as $cart_item){
							$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
							$tongtien += $thanhtien;
							$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $cart_item['masp']; ?></td>
					<td><?php echo $cart_item['tensanpham']; ?></td>
					<td><?php echo $cart_item['soluong']; ?></td>
					<td><?php echo number_format($cart_item['giasp'],0,',','.').'đ'; ?></td>
					<td><?php echo number_format($thanhtien,0,',','.').'đ'; ?></td>
					<td><a href="add-to-cart.php?xoa=<?php echo $cart_item['id'] ?>">Delele</a></td>
				</tr>
				<?php
					}
				?>
				<tr>
					<td colspan="7">
						<p>Subtotal: <?php echo number_format($tongtien,0,',','.').'đ'; ?></p>
						<p><a href="add-to-cart.php?xoatatca=1">Delete All Products</a></p>
						<div style="clear: both;"></div>
						<?php
						 	if(isset($_SESSION['user_name'])){
						?>
						 	<p><a href="checkout.php">Checkout your Cart here</a></p>
						<?php
							}else{ 
						?>
							<p><a href="sign.html">You need to sign in before checkout</a></p>
						<?php
							}  
						?>
					</td>
				</tr>
				<?php
				} else {  
				?>
				<tr>
					<td colspan="7"><p>Hiện tại giỏ hàng không có sản phẩm</p></td>
				</tr>
				<?php
				}  
				?>
			</table>	
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