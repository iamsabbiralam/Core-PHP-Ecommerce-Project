<?php
	require("inc.php");

	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$user = $db->select("admin","*",$where);

	if($user["rows"][0]["role"] == "Editor"){
		header("location:dashboard.php?msg=Access Deny");
		exit();
	}

	$post_value = [
		["a_id","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:adminlist.php?msg=".$validate->isError());
	}
	else{
		$where = "email='".Session::getValue("email")."'";
		$admin_data = $db->select("admin","*",$where);

		$view = new Views();
		$view->render("edit_admin",$admin_data,"admin/");
	}