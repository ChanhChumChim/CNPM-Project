<?php
    include('../admin/config.php');

    $response = array('status' => '', 'message' => '');

    if (isset($_POST['dangky'])) {
        $tenkhachhang = $_POST['name'];
        $email = $_POST['email'];
        $dienthoai = $_POST['phone-number'];
        $matkhau = md5($_POST['password']);
        $diachi = $_POST['address'];
        $sql_dangky = mysqli_query($mysqli, "INSERT INTO register(user_name,email,address,password,phone_number) 
            VALUES ('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
    }

    if($sql_dangky) {
        header("Location: ../html/sign.html");
        exit();
    }
?>