<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style>
	body{
		background-image:url("../assets/images/bg.jpg");
	}
</style>
</head>
<body>
	<form action="process/login_process.php" method="post">
		<table>
			<tr>
				<td><a href="../index.php"><img src="../assets/images/logo.png" height="290"></a></td>
				<td><img src="../assets/images/banner.png" height="300" width="1050"></td>
			</tr>
			<tr>
				<td></td>
				<td><h2 style="color:purple" align="center">Login</h2></td>
			</tr>
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
				<td></td>
				<td>
					<table align="center">
						<tr>
							<td>E-mail: </td>
							<td><input type="email" name="email" placeholder="E-email"></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="pwd" placeholder="Password"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Login"></td>
						</tr>
						<tr>
							<td></td>
							<td>New member? <a href="register.php">Register</a> here.</td>
						</tr>
						<tr>
							<td></td>
							<td><a href="forgetpass.php">Forgot password?</a></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		&copy;All Right Reserved by Trendy Bloom 2021.
	</form>
</body>
</html>