<?php
	require("../classess/session.php");

	Session::init();
	Session::destroyValues();

	header("location:index.php");
?>