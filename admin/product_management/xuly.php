<?php
    include('../config.php');

    $tensanpham = $_POST['tensanpham'];
    $masp = $_POST['masp'];
    $giasp = $_POST['giasp'];
    $soluong = $_POST['soluong'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];

    if(isset($_POST['themsanpham'])) {
        $sql_them = "INSERT INTO product(product_name,product_code,product_price,amount,product_image,tomtat,noidung,status,category_id) 
        VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp,'../../images/admin_images/'.$hinhanh);
        header('Location:../admin_management.php?action=quanlysanpham');
    } else {
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM product WHERE product_id='".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)) {
            unlink('../../images/admin_images/'.$row['product_image']);
        }
        $sql_xoa = "DELETE FROM product WHERE product_id='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../admin_management.php?action=quanlysanpham');
    }
?>