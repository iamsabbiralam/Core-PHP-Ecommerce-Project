<?php $value = $this->data['rows']; 
			/*echo "<pre>";
			print_r($value);
			echo "</pre>";
			exit();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Orders</title>
</head>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">My Orders</h2>
<table align="center" class='content'>
	<tr>
		<td></td>
		<td style="color:red" align="center">
			<?php
				if(isset($_GET['msg'])){
					echo $_GET['msg'];
				}
			?>
		</td>
	</tr>
	<tr>
		<th>E-mail</th>
		<th>Total Price</th>
		<th>Payment Method</th>
		<th>Order Status</th>
		<th>Order Time</th>
		<th>Manage</th>
	</tr>
	<?php
		foreach ($value as $val) {
			/*echo "<pre>";
			print_r($val);
			echo "</pre>";
			exit();*/
	?>
	<tr>
		<td><?php echo $val['u_email']; ?></td>
		<td><?php echo $val['final_total']; ?></td>
		<td><?php echo $val['pay_method']; ?></td>
		<td><?php echo $val['order_status']; ?></td>
		<td><?php echo $val['checkout_time']; ?></td>
		<td>
			<?php
				if($val['order_status'] != "pending"){
			?>
				<a href="myorder_view.php?ch_id=<?php echo $val['ch_id'] ?>">View</a>
			<?php
				}
				else{
			?>
			<a href="process/cencel_order_process.php?ch_id=<?php echo $val['ch_id'] ?>">Cencel</a> | 
			<a href="myorder_view.php?ch_id=<?php echo $val['ch_id'] ?>">View</a>
		<?php } ?>
		</td>
	</tr>
	<?php
		}
	?>
</table>