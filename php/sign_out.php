<?php
    session_start();
    include("../admin/config.php");
    
    session_unset();

    // Hủy bỏ phiên làm việc
    session_destroy();
    echo "<script>alert('Signed Out');</script>";
    // Chuyển hướng đến trang đăng nhập hoặc trang chính
    header("Location: ../html/index.php");
    exit();
?>