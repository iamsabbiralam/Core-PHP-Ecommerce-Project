<?php
	require("inc.php");
	
	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$user = $db->select("admin","*",$where);

	if($user["rows"][0]["role"] == "Editor"){
		header("location:dashboard.php?msg=Access Deny");
		exit();
	}

	$get_users = $db->select("users","*");

	$view = new Views();
	$view->render("user",$get_users,"admin/");