<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Payment Method</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Edit Payment Method</h2>
<form action="process/edit_paymethod_process.php?pay_id=<?php echo $value['pay_id']; ?>" method="post">
	<table>
		<tr>
			<td>Edit Payment Method: </td>
			<td><input type="text" name="pay_method" value="<?php echo $value['pay_method']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Edit"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>