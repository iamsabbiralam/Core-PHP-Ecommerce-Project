<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Admin Panel</h2>
<table class='content'>
	<tr>
		<th>Full Name</th>
		<th>E-mail</th>
		<th>Mobile No</th>
		<th>Address</th>
		<th>Role</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($value as $key => $val) {
	?>
	<tr>
		<td><?php echo $val['name']; ?></td>
		<td><?php echo $val['email']; ?></td>
		<td><?php echo $val['phone']; ?></td>
		<td><?php echo $val['address']; ?></td>
		<td><?php echo $val['role']; ?></td>
		<td>
			<?php
				if($key == 0){
					echo 'No action needed';
				}
				else{
			?>
			<a href="edit_admin.php?a_id=<?php echo $val['a_id']; ?>">Edit</a> | <a href="delete_admin_process.php?<?php echo $val['a_id']; ?>">Delete</a>
		<?php } ?>
		</td>
	</tr>
	<?php
		}
	?>
</table>