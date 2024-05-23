<div class="clear"></div>
<div class="main">

    <?php
        if(isset($_GET['action'])) {
            $tam = $_GET['action'];
        } else {
            $tam = '';
        }
        if($tam == 'quanlydanhmucsanpham') {
            include("product_category_management/add.php");
            include("product_category_management/lietke.php");
        } else if ($tam == 'quanlysanpham') {
            include("product_management/add.php");
            include("product_management/lietke.php");
        } else if ($tam == 'quanlydonhang') {
            include("orders_management/orders.php");
        } else {
            include("dashboard.php");
        }
    ?>
</div>