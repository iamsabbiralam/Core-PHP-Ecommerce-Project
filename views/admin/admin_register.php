<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Registration</title>
	<style>
	body{
		background-image:url("../assets/images/bg.jpg");
	}
</style>
</head>
<body>
	<form action="process/adminregister_process.php" method="post">
		<table align="center">
			<tr>
				<td></td>
				<td><h2 style="color:purple" align="center">Admin Registration</h2></td>
			</tr>
			<tr>
				<td><?php require("inc/nav.php"); ?></td>
				<td>
					<table align="center">
						<tr>
							<td>Full Name: </td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr>
							<td>E-mail: </td>
							<td><input type="email" name="email"></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="pass"></td>
						</tr>
						<tr>
							<td>Mobile No: </td>
							<td><input type="tel" name="phone"></td>
						</tr>
						<tr>
							<td>Address: </td>
							<td><input type="text" name="address"></td>
						</tr>
						<tr>
							<td>Role: </td>
							<td>
								<select name="role">
									<option value="Admin">Admin</option>
									<option value="Editor">Editor</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Register"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		&copy;All Right Reserved by Trendy Bloom 2021.
	</form>
</body>
</html>
