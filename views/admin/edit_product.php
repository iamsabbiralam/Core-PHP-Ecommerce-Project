<?php
	$product = $this->data['products']['rows'][0];
	$categories = $this->data['categories']['rows'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Product</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Edit Product</h2>
<form action="process/edit_pro_process.php?op_pic=<?php echo $product['p_pic']; ?>" method="post" enctype = "multipart/form-data">
	<table>
		<tr>
			<td><input type="hidden" name="pid" value="<?php echo $product['pid']; ?>"></td>
		</tr>
		<tr>
			<td>Product Name: </td>
			<td><input type="text" name="p_name" value="<?php echo $product['p_name']; ?>"></td>
		</tr>
		<tr>
			<td>Product Category: </td>
			<td><select name="cid">
					<?php foreach ($categories as $val) {
						echo '<option value="'.$val["cid"].'">'.$val["cat_name"].'</option>';
					} ?>
				</select></td>
		</tr>
		<tr>
			<td>Product Price: </td>
			<td><input type="text" name="p_price" value="<?php echo $product['p_price']; ?>"></td>
		</tr>
		<tr>
			<td>Product Descriptions: </td>
			<td>
				<textarea cols="50" rows="5" name="p_desc"><?php echo $product['p_desc']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>Product Brand: </td>
			<td><input type="text" name="p_brand" value="<?php echo $product['p_brand']; ?>"></td>
		</tr>
		<tr>
			<td>Product Stock: </td>
			<td><input type="text" name="p_stock" value="<?php echo $product['p_stock']; ?>"></td>
		</tr>
		<tr>
			<td>Product Image: </td>
			<td><img src="<?php echo "../assets/products/".$product['p_pic']; ?>" width="100"></td>
		</tr>
		<tr>
			<td>Image: </td>
			<td><input type="file" name="p_pic"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Edit product"></td>
		</tr>
	</table>
</form>
<?php
	/*echo '<pre>';
print_r($_POST);
echo '</pre>';
 	exit();*/
 require("inc/footer.php"); ?>