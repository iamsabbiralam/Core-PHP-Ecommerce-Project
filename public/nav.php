<?php

	if(Session::checkSession("email")){
?>
	<a href="index.php">Home</a> |
	<a href="cart.php">Cart</a> |
	<a href="user/profile.php">Profile</a> |
	<a href="user/updateprofile.php">Update Profile</a> |
	<a href="user/updatepass.php">Update Password</a> |
	<a href="user/myorder.php">My Order</a> |
	<a href="user/logout.php">Logout</a> |
	<a href="contact.php">Contact us</a> |
	<a href="about.php">About</a>
<?php
	}
	else{
?>
<a href="index.php">Home</a> |
<a href="user/index.php">Login</a> |
<a href="user/register.php">Registration</a> |
<a href="contact.php">Contact us</a> |
<a href="about.php">About</a>
<?php } ?>