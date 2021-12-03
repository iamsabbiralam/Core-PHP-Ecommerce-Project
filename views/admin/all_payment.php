<?php $value = $this->data["rows"]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Payment Method</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">All Payment Method</h2>
<table class='content'>
	<tr>
		<th>Payment Method</th>
		<th>Action</th>
	</tr>
	<?php foreach ($value as $val) {
	?>
	<tr>
		<td><?php echo $val['pay_method']; ?></td>
		<td><a href="edit_paymethod.php?pay_id=<?php echo $val['pay_id']; ?>">Edit</a> | 
			<a href="process/delete_paymethod_process.php?pay_id=<?php echo $val['pay_id']; ?>">Delete</a></td>
	</tr>
	<?php
	} ?>
</table>
<?php require("inc/footer.php"); ?>