<?php
	$sql_lietke_dh = "SELECT * FROM orders,register WHERE orders.user_id=register.user_id ORDER BY orders.orders_id ASC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);  
?>

<p>List of pending Orders</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Orders Code</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Manager</th>
    </tr>
    <?php
    	$i = 0;
    	while($row = mysqli_fetch_array($query_lietke_dh)) {
    		$i++;
	?>
	<tr>
		<th><?php echo $i ?></th>
        <th><?php echo $row['orders_code'] ?></th>
        <th><?php echo $row['user_name'] ?></th>
        <th><?php echo $row['address'] ?></th>
        <th><?php echo $row['email'] ?></th>
        <th><?php echo $row['phone_number'] ?></th>
        <th><a href="#">Check Orders Details</a></th>
	</tr>
	<?php
		}  
	?>
</table>