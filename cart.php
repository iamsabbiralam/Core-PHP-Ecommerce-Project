<?php 
	require("public/inc.php");

	$db = new Model();
	
	$where = "email='".Session::getValue("email")."'";
	$get_status = $db->select("users","status",$where);

	if($get_status['rows'][0]['status'] == 'pending'){
		header("location:user/pending_status.php");
		exit();
	}
	elseif($get_status['rows'][0]['status'] == 'block'){
		header("location:user/block_status.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cart</title>
<?php
	require("public/header.php");


	/*echo '<pre>';
	print_r($user);
	echo '</pre>';
	exit();*/


	$sub_total = 0;

	//user query
	$u_email = Session::getValue("email");
	$where = "email='".$u_email."'";
	$user = $db->select("users","*",$where);
	$user = $user['rows'][0];

	/*echo '<pre>';
	print_r($user);
	echo '</pre>';
	exit();*/



	//shipping address
	$where = "email='".Session::getValue("email")."'";
	$address = $db->select("address","*",$where);
	$address = $address['rows'][0];

	/*echo '<pre>';
	print_r($address);
	echo '</pre>';
	exit();*/

	//shipping
	$where = "s_city='".$address['city']."'";
	$get_shipping = $db->select("shipping","*",$where);

	//pay method query
	$pay_method = $db->select("paymethod","*");

	//cart query
	$where = "u_email='".$u_email."'";
	$get_data = $db->select("cart","*",$where);
	
?>
<h2 style="color:purple;" align="center">Cart Page</h2>
<?php
	if($get_data['count'] == 0){
		echo "<h1 align='center'>cart is empty</h1>";
	}
	else{
		?>
	<center><strong>Name:</strong> <?php echo $user['fullname']; ?><br>
	<strong>Email:</strong> <?php echo $user['email']; ?><br>
	<strong>Shipping Address: </strong><?php echo $address['address'].", ".$address['city'].", ".$address['country']; ?><a href="user/b_address.php"> Change</a><br>
	<strong>Phone:</strong> <?php echo $user['phone']; ?></center><hr>
	<p>&nbsp;</p>
	<table width="600" align="center">
		<tr>
			<th align="left">Product Name</th>
			<th align="left">Price</th>
			<th align="left">Quantity</th>
			<th align="left">Total</th>
			<th align="left">Action</th>
		</tr>
	<?php
		foreach ($get_data['rows'] as $value) {
			?>
			<tr>
				<td><?php echo $value['p_name']; ?></td>
				<td><?php echo $value['p_price']; ?></td>
				<td><?php echo $value['qty']; ?></td>
				<td><?php echo $value['price_total']; ?></td>
				<td><a href="public/process/del_cart_process.php?crt_id=<?php echo $value['crt_id']; ?>">Delete</a></td>
			</tr>
			<?php
			$sub_total += $value['price_total'];
		}
	?>
			<tr>
				<td colspan="5"><hr></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">Sub Total:</td>
				<td><?php echo $sub_total; ?></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">Shipping Cost: </td>
				<td><?php echo $get_shipping['rows'][0]['s_rate']; ?></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5"><hr></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">Total: </td>
				<td><?php echo ($sub_total + $get_shipping['rows'][0]['s_rate']); ?></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5">
					<form action="public/process/checkout_process.php" method="post">
						<input type="hidden" name="shipping_cost" value="<?php echo $get_shipping['rows'][0]['s_rate']; ?>">
						<input type="hidden" name="final_total" value="<?php echo ($sub_total + $get_shipping['rows'][0]['s_rate']); ?>">
						<?php
							foreach ($pay_method['rows'] as $value) {
								if($value['pay_method'] === "Cash on Delivery"){
									echo '<input type="radio" name="pay_method" value="'.$value['pay_method'].'" checked>'.$value["pay_method"].'<br>';
								}
								else{
									echo '<input type="radio" name="pay_method" value="'.$value['pay_method'].'">'.$value["pay_method"].'<br>';
								}
							}
						?>
						<hr>
						<tr>
							<td>
								<input type="submit" value="Checkout">
								<button><a href="public/process/clear_cart_process.php">Clear</a></button>
							</td>
						</tr>
					</form>
				</td>
			</tr>
	</table>
<?php } ?>