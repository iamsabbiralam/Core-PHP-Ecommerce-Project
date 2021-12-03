<?php
	require("../classess/session.php");

	Session::init();
	session_destroy();

	header("location:index.php?msg=Tata! Bye Bye! Khatam! Maja aya.");
?>