<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Categories</title>
<?php require("inc/header.php"); ?>
<?php $value = $this->data['rows']; ?>
<h2 style="color:purple" align="center">All Categories</h2>
	<table class='content'>
		<tr>
			<th>Category ID</th>
			<th>Category Name</th>
			<th>Action</th>
		</tr>
		<?php
		foreach ($value as $val) {
		?>
		<tr>
			<td><?php echo $val['cid']; ?></td>
			<td><?php echo $val['cat_name']; ?></td>
			<td><a href="edit_category.php?cid=<?php echo $val['cid']; ?>">Edit</a> |
				<a href="process/delete_category_process.php?cid=<?php echo $val['cid']; ?>">Delete</a></td>
		</tr>
		<?php
		}
		?>
	</table>
<?php require("inc/footer.php"); ?>