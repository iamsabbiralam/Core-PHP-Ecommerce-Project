<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Category</title>
</head>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Add Category</h2>
<form action="process/add_category_process.php" method="post">
	<table>
		<tr>
			<td>Add Category: </td>
			<td><input type="text" name="cat_name"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Add"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>