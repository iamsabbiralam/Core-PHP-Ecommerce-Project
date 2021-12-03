<?php 
	$value = $this->data['rows'][0];
	// $address = $this->data['address']['rows'];
	/*echo '<pre>';
	print_r($users);
	echo '</pre>';
	exit();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shipping address</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Update shipping address</h2>
<form action="process/b_add_process.php" method="post">
	<table align="center">
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
			<td>Address:</td>
			<td><input type="text" name="address" Value="<?php echo $value['address']; ?>"></td>
		</tr>
		<tr>
			<td>City:</td>
			<td><input type="text" name="city" Value="<?php echo $value['city']; ?>"></td>
		</tr>
		<tr>
			<td>Country:</td>
			<td><input type="text" name="country" Value="<?php echo $value['country']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="Update">
			</td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>