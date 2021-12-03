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
		["pay_id","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:all_payment.php?msg=".$validate->isError());
	}
	else{
		$where = "pay_id='".$_REQUEST['pay_id']."'";
		$get_peymethod = $db->select("paymethod","*",$where);

		$view = new Views();
		$view->render("edit_paymethod",$get_peymethod,"admin/");

	}
