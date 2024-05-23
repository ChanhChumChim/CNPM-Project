<?php
    $sql_lietke_sp = "SELECT * FROM product, category WHERE  product.category_id=category.category_id ORDER BY product.product_id ASC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<p>List of Products</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Price</th>
        <th>Amount Left</th>
        <th>Category</th>
        <th>Product Code</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Manager</th>
    </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sp)) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['product_name'] ?></td>
        <td><img src="../images/admin_images/<?php echo $row['product_image'] ?>" width="200px" ></td>
        <td><?php echo $row['product_price'] ?></td>
        <td><?php echo $row['amount'] ?></td>
        <td><?php echo $row['category_name'] ?></td>
        <td><?php echo $row['product_code'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if($row['status'] == 0) {
                echo 'Mới';
            } else {
                echo 'Đã qua sử dụng';
            }
            ?>
        </td>
        <td>
            <a href="product_management/xuly.php?idsanpham=<?php echo $row['product_id'] ?>">Delete</a> 
        </td>
    </tr>
    <?php
        }
    ?>
</table>