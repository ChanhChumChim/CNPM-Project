<?php
	session_start();
	include("../admin/config.php");

	//Delete 1 Product Only Configuration
	if(isset($_SESSION['cart']) && $_GET['xoa']){
		$id = $_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['id'] != $id){
				$product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['giasp'],'masp'=>$cart_item['masp']);
			}

			$SESSION_['cart'] = $product;
			header('Location:cart.php');
		}
	}

	//Delete All Configuration
	if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
		unset($_SESSION['cart']);
		header('Location:cart.php');
	}

	if(isset($_POST['add-to-cart'])){
		$id = $_GET['idsanpham'];
		$soluong = 1;
		$sql = "SELECT * FROM product WHERE product_id='".$id."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_array($query);

		if($row){
			$new_product = array(array('tensanpham'=>$row['product_name'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['product_price'],'hinhanh'=>$row['product_image'],'masp'=>$row['product_code']));

			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					if($cart_item['id'] == $id){
						$product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['giasp'],'masp'=>$cart_item['masp']);
						$found = true;
					} else {
						$product[] = array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['giasp'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false) {
					$_SESSION['cart'] = array_merge($product,$new_product);
				} else {
					$_SESSION['cart'] = $product;
				}
			} else {
				$_SESSION['cart'] = $new_product;
			}
		}
		header('Location:cart.php');
	} 
?>