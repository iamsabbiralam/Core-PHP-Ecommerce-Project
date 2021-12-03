<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
<?php $value = $this->data['rows']; ?>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Add Product</h2>
<form action="process/add_product_process.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Product Name: </td>
			<td><input type="text" name="p_name"></td>
		</tr>
		<tr>
			<td>Product Category: </td>
			<td>
				<select name="cid">
					<option value="">Select a Category</option>
					<?php foreach ($value as $val) {
						echo '<option value="'.$val["cid"].'">'.$val["cat_name"].'</option>';
					} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Product Price: </td>
			<td><input type="text" name="p_price"></td>
		</tr>
		<tr>
			<td>Product Descriptions: </td>
			<td><textarea cols="50" rows="5" name="p_desc"></textarea></td>
		</tr>
		<tr>
			<td>Product Brand: </td>
			<td><input type="text" name="p_brand"></td>
		</tr>
		<tr>
			<td>Product Stock: </td>
			<td><input type="text" name="p_stock"></td>
		</tr>
		<tr>
			<td>Product Image: </td>
			<td><input type="file" name="p_pic"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Add"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>