<?php
	// require("../classess/session.php");

	// Session::init();
	if(Session::checkSession("email")){
?>
	<ul>
		<li>
			<a href="profile.php">Profile</a>
		</li>
		<li>
			<a href="updateprofile.php">Update Profile</a>
		</li>
		<li>
			<a href="updatepass.php">Update Password</a>
		</li>
		<li>
			<a href="myorder.php">My Order</a>
		</li>
		<li>
			<a href="logout.php">Logout</a>
		</li>
	</ul>
<?php
	}
	else{
?>
	<ul>
		<a href="index.php">Home</a><br>
		<a href="user/index.php">Login</a><br>
		<a href="user/register.php">Registration</a><br>
		<a href="">Contact us</a><br>
		<a href="about.php">About</a>
	</ul>
<?php } ?>