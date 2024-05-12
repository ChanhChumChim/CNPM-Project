<?php
    $sql_lietke_danhmucsp = "SELECT * FROM category ORDER BY thutu ASC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Manager</th>

    </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['category_name'] ?></td>
        <td>
            <a href="product_category_management/xuly.php?iddanhmuc=<?php echo $row['category_id'] ?>">Delete</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>