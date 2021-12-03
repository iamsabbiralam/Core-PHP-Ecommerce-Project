<?php
	require("../classess/session.php");
	Session::init();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Status</title>
	<style>
	body{
		background-image:url("../assets/images/bg.jpg");
	}
</style>
</head>
<body>
	<table align="center">
		<tr>
			<td><a href="../index.php"><img src="../assets/images/logo.png" height="290"></a></td>
			<td><img src="../assets/images/banner.png" height="300" width="1050"></td>
		</tr>
		<tr>
			<td></td>
			<td><h2 style="color:purple" align="center">status</h2></td>
		</tr>
		<tr>
			<td>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="user/index.php">Login</a></li>
					<li><a href="user/register.php">Registration</a></li>
					<li><a href="">Contact us</a></li>
					<li><a href="">About</a></li>
				</ul>
			</td>
			<td>Your accounts has been disable. For more quries please contact the admin. Thank you.</td>
		</tr>
	</table>
	&copy;All Rights Reserved by Trendy Blooms 2021.
</body>
</html>
