<?php
	require("inc.php");

	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$get_status = $db->select("users","status",$where);

	if($get_status['rows'][0]['status'] == 'pending'){
		header("location:pending_status.php");
		exit();
	}
	elseif($get_status['rows'][0]['status'] == 'block'){
		header("location:block_status.php");
		exit();
	}
	else{
		$where = "u_email='".Session::getValue("email")."'";
		$get_order = $db->select("tbl_checkout","*",$where);

		$view = new Views();
		$view->render("myorder",$get_order,"user/");
	}