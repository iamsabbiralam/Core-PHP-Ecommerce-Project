<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<style>
		body{
			background-image:url("../assets/images/bg.jpg");
		}
	</style>
	<!-- <link rel="stylesheet" type="text/css" href="../assets/style.css"> -->
</head>
<body>
	<form action="process/login_process.php" method="post" >
		<table class='content' align="center">
			<center>
				<img src="../assets/images/logo.png" height="200">
			</center>
			<tr>
				<td></td>
				<td><h2 style="color:purple">Welcome to Trendy Bloom</h2></td>
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
				<th>E-mail: </th>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<th>Password: </th>
				<td><input type="Password" name="pass"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>