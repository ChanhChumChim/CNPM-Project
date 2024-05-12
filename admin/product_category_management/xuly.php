<?php
    include('../config.php');

    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc'])) {
        $sql_them = "INSERT INTO category(category_name,thutu) VALUE('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli, $sql_them);
        header('Location:../admin_management.php?action=quanlydanhmucsanpham');
    } else {
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM category WHERE category_id='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../admin_management.php?action=quanlydanhmucsanpham');
    }
?>