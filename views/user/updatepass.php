<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Password</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Update Password</h2>
<form action="process/updatepass_process.php" method="post">
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
			<td>Old Password: </td>
			<td><input type="password" name="op"></td>
		</tr>
		<tr>
			<td>New Password: </td>
			<td><input type="password" name="np"></td>
		</tr>
		<tr>
			<td>Confirm Password: </td>
			<td><input type="password" name="cp"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>