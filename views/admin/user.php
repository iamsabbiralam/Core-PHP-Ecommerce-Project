<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users List</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Users List</h2>
<table class= 'content'>
	<tr>
		<th>Image</th>
		<th>Full Name</th>
		<th>E-mail</th>
		<th>Mobile No</th>
		<th>Gender</th>
		<th>DOB</th>
		<th>Address</th>
		<th>City</th>
		<th>Country</th>
		<th>Action</th>
	</tr>
	<?php
		foreach ($value as $val) {
	?>
	<tr>
		<td>
			<?php
				if($val['u_pic'] != ""){
			?>
			<img src="../assets/images/user_dp/<?php echo $val['u_pic']; ?>" height="120">
			<?php
				}
				else{
			?>
			<img src="../assets/images/dp.png" height="100">
		<?php } ?>
		</td>
		<td><?php echo $val['fullname']; ?></td>
		<td><?php echo $val['email']; ?></td>
		<td><?php echo $val['phone']; ?></td>
		<td><?php echo $val['gender']; ?></td>
		<td><?php echo $val['dob']; ?></td>
		<td><?php echo $val['address']; ?></td>
		<td><?php echo $val['city']; ?></td>
		<td><?php echo $val['country']; ?></td>
		<td>
			<form action="process/status.php" method="post">
				<input type="hidden" name="u_id" value="<?php echo $val['u_id']; ?>">
				<strong>Status:</strong> <?php echo $val['status']; ?><br>
				<p>Change Status:
					<select name="status">
						<option>Select Status</option>
						<option value="active">Active</option>
						<option value="pending">Pending</option>
						<option value="block">Block</option>
					</select>
				</p>
				<input type="submit" value="Change">
			</form>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<?php require("inc/footer.php"); ?>