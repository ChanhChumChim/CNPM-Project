<p> Add New Products </p>
<table border="1" widt
+h="100%" style="border-collapse: collapse;">
    <form method="POST" action="product_management/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Product Name</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Product Code</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Product Price</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Amount</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Product Image</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td><textarea rows="10" name="tomtat" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td><textarea rows="10" name="noidung" style="resize:none"></textarea></td>
        </tr>
        <tr>
            <td>Product's Category</td>
            <td>
                <select name="danhmuc">
                    <?php
                        $sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    ?>
                    <option value = "<?php echo $row_danhmuc['category_id'] ?>"><?php echo $row_danhmuc['category_name'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Add new Product"></td>
        </tr>
    </form>
</table>