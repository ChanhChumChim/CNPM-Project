<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Management</title>
		<link rel="stylesheet" href="../css/admin_style.css">
	</head>
	<?php
	    session_start();
	    if(!isset($_SESSION['dangnhap'])) {
	        header('Location:admin_login.php');
	    }
   	?>
	<body>
		<h3 class="title_admin">Administrator Page</h3>
	    <div class="wrapper">
	    <?php
	      	include("config.php");
	     	include("menu.php");
	      	include("main.php");
	    ?>
	    </div>
	</body>
</html>