<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Profile</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Update Profile</h2>
<form action="process/update_profile_process.php" method="post">
	<table align="center">
		<tr>
			<td></td>
			<td style="color:red" align="center">
				<?php
					if(isset($_GET['msg'])){
						echo $_GET['msg'];
					}
				?>
			</td>
		</tr>
		<tr>
			<td>Full Name: </td>
			<td><input type="text" name="fullname" value="<?php echo $value['fullname']; ?>"></td>
		</tr>
		<tr>
			<td>Mobile No: </td>
			<td><input type="text" name="phone" value="<?php echo $value['phone']; ?>"></td>
		</tr>
		<tr>
			<td>DOB: </td>
			<td><input type="date" name="dob" value="<?php echo $value['dob']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>