<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Dashboard</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Update Dashboard</h2>
<form action="process/update_dashboard_process.php" method="post">
	<table align="center">
		<tr>
			<td><input type="hidden" name="a_id" value="<?php echo $value['a_id']; ?>"></td>
		</tr>
		<tr>
			<td>Full Name: </td>
			<td><input type="text" name="name" value="<?php echo $value['name']; ?>"></td>
		</tr>
		<tr>
			<td>Mobile No: </td>
			<td><input type="text" name="phone" value="<?php echo $value['phone']; ?>"></td>
		</tr>
		<tr>
			<td>Address: </td>
			<td><input type="text" name="address" value="<?php echo $value['address']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>