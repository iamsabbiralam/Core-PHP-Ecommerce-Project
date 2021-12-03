<?php
	/*require("inc.php");

	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$get_status = $db->select("users","status",$where);
	if($status['count'] > 0 && $status['rows'][0] == 'pending'){
		header("location:pending_status.php");
		exit();
	}

	echo '<pre>';
	print_r($status['rows'][0]);
	echo '</pre>';
	exit();

	if($get_status['rows'][0]['status'] == 'pending'){
		header("location:pending_status.php");
		exit();
	}
	elseif($get_status['rows'][0]['status'] == 'block'){
		header("location:block_status.php");
		exit();
	}*/