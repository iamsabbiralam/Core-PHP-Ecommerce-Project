<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Shipping</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">All Shipping</h2>
<table class='content'>
	<tr>
		<th>Country</th>
		<th>City</th>
		<th>Rate</th>
		<th>Delivery Time</th>
		<th>Delivery Method</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($value as $val) {
	?>
	<tr>
		<td><?php echo $val['s_country']; ?></td>
		<td><?php echo $val['s_city']; ?></td>
		<td><?php echo $val['s_rate']; ?></td>
		<td><?php echo $val['s_time']; ?></td>
		<td><?php echo $val['s_method']; ?></td>
		<td><a href="edit_shipping.php?sid=<?php echo $val['sid']; ?>">Edit</a> | 
			<a href="process/delete_shipping_process.php?sid=<?php echo $val['sid']; ?>">Delete</a></td>
	</tr>
	<?php
		}
	?>
</table>
<?php require("inc/footer.php"); ?>