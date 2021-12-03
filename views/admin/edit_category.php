<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Category</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Edit Category</h2>
<form action="process/edit_category_process.php?cid=<?php echo $value['cid']; ?>" method="post">
	<table>
		<tr>
			<td>Edit category: </td>
			<td><input type="text" name="cat_name" value="<?php echo $value['cat_name']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Edit"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>