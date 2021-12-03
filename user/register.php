<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<style>
	body{
		background-image:url("../assets/images/bg.jpg");
	}
</style>
</head>
<body>
	<form action="process/register_process.php" method="post">
		<table>
			<tr>
				<td><a href="../index.php"><img src="../assets/images/logo.png" height="290"></a></td>
				<td><img src="../assets/images/banner.png" height="290" width="1050"></td>
			</tr>
			<tr>
				<td></td>
				<td><h2 style="color:purple" align="center">Registration</h2></td>
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
							<td>Full Name: </td>
							<td><input type="text" name="fullname" placeholder="Full name"></td>
						</tr>
						<tr>
							<td>E-mail: </td>
							<td><input type="email" name="email" placeholder="Email"></td>
						</tr>
						<tr>
							<td>Password: </td>
							<td><input type="password" name="pwd" placeholder="Password"></td>
						</tr>
						<tr>
							<td>Mobile No: </td>
							<td><input type="tel" name="phone" placeholder="Mobile No"></td>
						</tr>
						<tr>
							<td>Gender: </td>
							<td>
								Male<input type="radio" name="gender" value="M">
								Female<input type="radio" name="gender" value="F">
							</td>
						</tr>
						<tr>
							<td>DOB: </td>
							<td><input type="date" name="dob"></td>
						</tr>
						<tr>
							<td>Present Address: </td>
							<td><input type="text" name="address"></td>
						</tr>
						<tr>
							<td>City: </td>
							<td><input type="text" name="city"></td>
						</tr>
						<tr>
							<td>Country: </td>
							<td><input type="text" name="country"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="Register"></td>
						</tr>
						<tr>
							<td></td>
							<td>Already a member?<a href="index.php">Login</a> here.</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		&copy;All Right Reserved by Trendy Bloom 2021.
	</form>
</body>
</html>
