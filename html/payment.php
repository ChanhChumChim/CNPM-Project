<?php
	session_start();
	include("../admin/config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="../images/favicon.png">
		<link rel="stylesheet" href="../css/payment.css">
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
			<div class="container">
				<form id="checkoutForm" action="">
					<div class="row">
						<div class="col">
							<h3 class="title">billing address</h3>

							<div class="inputBox">
								<span>full name :</span>
								<input type="text" id="fullName">
								<div id="fullNameError" class="error"></div>
							</div>
							<div class="inputBox">
								<span>email :</span>
								<input type="email" id="email" placeholder="example@example.com">
								<div id="emailError" class="error"></div>
							</div>
							<div class="inputBox">
								<span>address :</span>
								<input type="text" id="address" placeholder="Room / Street / Locality">
								<div id="addressError" class="error"></div>
							</div>
							<div class="inputBox">
								<span>city :</span>
								<input type="text" id="city">
								<div id="cityError" class="error"></div>
							</div>

							<div class="flex">
								<div class="inputBox">
									<span>country :</span>
									<select id="country">
										<option value="">Select a country</option>
									</select>
									<div id="countryError" class="error"></div>
								</div>
								<div class="inputBox">
									<span>zip code :</span>
									<input type="text" id="zipCode">
									<div id="zipCodeError" class="error"></div>
								</div>
							</div>
						</div>

						<div class="col">
							<h3 class="title">payment</h3>

							<div class="inputBox">
								<span>cards accepted :</span>
								<img src="../images/credible_card.png" alt="">
							</div>
							<div class="inputBox">
								<span>name on card :</span>
								<input type="text" id="cardName">
								<div id="cardNameError" class="error"></div>
							</div>
							<div class="inputBox">
								<span>credit card number :</span>
								<input type="number" id="cardNumber">
								<div id="cardNumberError" class="error"></div>
							</div>
							<div class="inputBox">
								<span>expire date :</span>
								<input type="month" id="expDate">
								<div id="expDateError" class="error"></div>
							</div>

							<div class="flex">
								<div class="inputBox">
									<span>Phone number :</span>
									<input type="text" id="phoneNumber" maxlength="15">
									<div id="phoneNumberError" class="error"></div>
								</div>
								<div class="inputBox">
									<span>CVV :</span>
									<input type="text" id="cvv" maxlength="4">
									<div id="cvvError" class="error"></div>
								</div>
							</div>
						</div>
					</div>

					<input type="submit" value="proceed to checkout" class="submit-btn">
					<div class="button-container">
						<button onclick="window.location.href='cart.html'">Back to Cart</button>
					</div>
				</form>
			</div>
		</main>

		<footer>
			<div class="wrapper1">
				<div class="box info">
					<h2 class="title">E-cart</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Consectetur dicta unde consequuntur maxime nobis officia nam earum, soluta a consequatur voluptate accusamus sapiente enim reprehenderit laboriosam, dolore veniam nulla. Illum.</p>
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