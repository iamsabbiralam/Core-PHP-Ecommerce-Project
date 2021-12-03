<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forget Password</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Forget Password</h2>
<form action="process/forgetpass_process.php" method="post">
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
			<td>Enter your email:</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Submit"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>