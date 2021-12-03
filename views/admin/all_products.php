<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Products</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">All Products</h2>
<table class= 'content'>
	<tr>
		<th>Product Name</th>
		<th>Product Category</th>
		<th>Product Price</th>
		<th>Product Brand</th>
		<th>Product Stock</th>
		<th>Product Image</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($value as $val) {
	?>
	<tr>
		<td><?php echo $val['p_name']; ?></td>
		<td><?php echo $val['cat_name']; ?></td>
		<td><?php echo $val['p_price']; ?></td>
		<td><?php echo $val['p_brand']; ?></td>
		<td><?php echo $val['p_stock']; ?></td>
		<td>
			<img src="<?php echo "../assets/products/".$val['p_pic']; ?>" width="50">
		</td>
		<td><a href="edit_product.php?pid=<?php echo $val['pid']; ?>&cid=<?php echo $val['cid']; ?>">Edit</a> |
			<a href="process/delete_product_process.php?pid=<?php echo $val['pid']; ?>">Delete</a></td>
	</tr>
	<?php
		}
	?>
</table>
<?php require("inc/footer.php"); ?>