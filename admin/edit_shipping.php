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
		["sid","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:all_shipping.php?msg=".$validate->isError());
	}
	else{
		$where = "sid='".$_REQUEST['sid']."'";
		$shipping = $db->select("shipping","*",$where);

		$view = new Views();
		$view->render("edit_shipping",$shipping,"admin/");
	}