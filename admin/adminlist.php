<?php
	require("inc.php");
	
	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$user = $db->select("admin","*",$where);

	if($user["rows"][0]["role"] == "Editor"){
		header("location:dashboard.php?msg=Access Deny");
		exit();
	}

	$get_admin = $db->select("admin","*");

	$view = new Views();
	$view->render("adminlist",$get_admin,"admin/");