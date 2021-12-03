<?php
	require("inc.php");

	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$users = $db->select("users","*",$where);

	$view = new Views();
	$view->render("b_address",$users,"user/");