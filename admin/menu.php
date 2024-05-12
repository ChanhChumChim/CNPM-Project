<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1) {
        unset($_SESSION['dangnhap']);
        header('Location:admin_login.php');
    }
?>

<ul class="admin_list">
    <li><a href = "admin_management.php?action=quanlydanhmucsanpham">Category Management</a></li>
    <li><a href = "admin_management.php?action=quanlysanpham">Product Management</a></li>
    <li><a href = "admin_management.php?action=quanly1">Orders Management</a></li>
    <li><a href = "admin_management.php?action=quanly2">Customer Reply Management</a></li>
    <li><a href = "admin_management.php?action=quanly3">Payment Management</a></li>
    <li><a href = "admin_management.php?dangxuat=1">
        Logout : 
            <?php if(isset($_SESSION['dangnhap'])) {
                echo $_SESSION['dangnhap'];
            }
            ?>
        </a> 
    </li>
</ul>