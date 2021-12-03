<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Shipping</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Add Shipping</h2>
<form action="process/add_shipping_process.php" method="post">
	<table>
		<tr>
			<td>Country: </td>
			<td><input type="text" name="s_country"></td>
		</tr>
		<tr>
			<td>City: </td>
			<td><input type="text" name="s_city"></td>
		</tr>
		<tr>
			<td>Rate: </td>
			<td><input type="text" name="s_rate"></td>
		</tr>
		<tr>
			<td>Delivery Time: </td>
			<td><input type="text" name="s_time"></td>
		</tr>
		<tr>
			<td>Shipping Method: </td>
			<td><input type="text" name="s_method"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Add"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>