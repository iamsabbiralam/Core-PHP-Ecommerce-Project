<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Shipping</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Edit Shipping</h2>
<form action="process/edit_shipping_process.php?sid=<?php echo $value['sid']; ?>" method="post">
	<table>
		<tr>
			<td>Country: </td>
			<td><input type="text" name="s_country" value="<?php echo $value['s_country']; ?>"></td>
		</tr>
		<tr>
			<td>City: </td>
			<td><input type="text" name="s_city" value="<?php echo $value['s_city']; ?>"></td>
		</tr>
		<tr>
			<td>Rate: </td>
			<td><input type="text" name="s_rate" value="<?php echo $value['s_rate']; ?>"></td>
		</tr>
		<tr>
			<td>Delivery Time: </td>
			<td><input type="text" name="s_time" value="<?php echo $value['s_time']; ?>"></td>
		</tr>
		<tr>
			<td>Delivery Method: </td>
			<td><input type="text" name="s_method" value="<?php echo $value['s_method']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Edit"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>