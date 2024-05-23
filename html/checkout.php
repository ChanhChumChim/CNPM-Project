<?php
	session_start();
	include("../admin/config.php");

	$id_khachhang = $_SESSION['user_id'];
	$orders_code = rand(1,9999);
	$insert_cart = "INSERT INTO orders(user_id,orders_code,orders_status) VALUE ('".$id_khachhang."','".$orders_code."', 1)";
	$orders_query = mysqli_query($mysqli, $insert_cart); 
	if($orders_query) {
		foreach($_SESSION['cart'] as $key=>$value) {
			$id_sanpham = $value['id'];

			$soluong = $value['soluong'];

			$insert_orders_details = "INSERT INTO orders_details(product_id, orders_code, ordered_amount) VALUE ('".$id_sanpham."','".$orders_code."','".$soluong."')";
			$orders_details_query = mysqli_query($mysqli, $insert_orders_details);
		}
	}
	unset($_SESSION['cart']);

	header('Location: payment.php');
?>