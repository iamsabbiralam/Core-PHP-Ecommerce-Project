<?php
	require("inc.php");

	$where = "email='".Session::getValue("email")."'";
	$db = new Model();
	$get_data = $db->select("admin","*",$where);

	$view = new Views();
	$view->render("dashboard",$get_data,"admin/");
?>