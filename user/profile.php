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
		$where = "email='".Session::getValue('email')."'";
		$get_data = $db->select("users","*",$where);

		$view = new Views();
		$view->render("profile",$get_data,"user/");
	}
	