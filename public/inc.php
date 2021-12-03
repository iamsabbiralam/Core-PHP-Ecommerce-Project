<?php
	require("classess/session.php");
	require("conn/database.php");
	require("model/model.php");

	Session::init();

	$db = new Model();
	$categories = $db->select("categories","*");
?>