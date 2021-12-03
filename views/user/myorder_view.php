<?php
	$user = $this->data['users'];
	$address = $this->data['address'];
	$orders = $this->data['orders'];
	$checkout = $this->data['checkout'];

	$sub_total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Order</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align= "center">Order Details</h2>
<table class = 'content'>
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
		<td>
			<strong>Name: </strong><?php echo $user['fullname']; ?><br>
			<strong>Address: </strong><?php echo $address['address'].",".$address['city'].",".$address['country']; ?><br>
			<strong>Phone: </strong><?php echo $user['phone']; ?><br>
			<strong>E-mail: </strong><?php echo $user['email']; ?>
		</td>
		<td>
			<strong>Payment Method: </strong><?php echo $checkout['pay_method']; ?><br>
		</td>
	</tr>
	<tr>
		<td>
			<table width="600">
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Qty.</th>
					<th>Total</th>
				</tr>
					<?php
						foreach ($orders as $value) {
					?>
				<tr>
					<td><?php echo $value['p_name']; ?></td>
					<td><?php echo $value['p_price']; ?></td>
					<td><?php echo $value['qty']; ?></td>
					<td><?php echo $value['price_total']; ?></td>
				</tr>
					<?php
						$sub_total += $value['price_total'];
						}
					?>
				<tr>
					<td></td>
					<td colspan="2">Sub Total: </td>
					<td><?php echo $sub_total; ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">Shipping Cost: </td>
					<td><?php echo $checkout['shipping_cost']; ?></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">Total: </td>
					<td><?php echo ($sub_total + $checkout['shipping_cost']); ?></td>
					<td></td>
				</tr>
			</table>
			<td><strong>Order Status: </strong><?php echo $checkout['order_status']; ?></td>
		</td>
	</tr>
</table>