<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Order</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">All Order</h2>
<table class='content'>
	<tr>
		<th>Order ID</th>
		<th>User Email</th>
		<th>Payment Method</th>
		<th>Cost</th>
		<th>Order Status</th>
		<th>Order Time</th>
		<th>Action</th>
	</tr>
	<?php
	foreach ($value as $val) {
	?>
	<tr>
		<td><?php echo $val['order_ids']; ?></td>
		<td><?php echo $val['u_email']; ?></td>
		<td><?php echo $val['pay_method']; ?></td>
		<td><?php echo $val['final_total']; ?></td>
		<td><?php echo $val['order_status']; ?></td>
		<td><?php echo $val['checkout_time']; ?></td>
		<td><a href="single_order.php?ch_id=<?php echo $val['ch_id']; ?>">View</a></td>
	</tr>
	<?php
	}
	?>
</table>
<?php require("inc/footer.php"); ?>