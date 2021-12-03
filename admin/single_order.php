<?php
	require("inc.php");


	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$user = $db->select("admin","*",$where);

	if($user["rows"][0]["role"] == "Editor"){
		header("location:dashboard.php?msg=Access Deny");
		exit();
	}

	//get checkout details
	$where = "ch_id='".$_REQUEST['ch_id']."'";
	$checkout = $db->select("tbl_checkout","*",$where);

	//get order details
	$orders = $checkout['rows'][0]['order_ids'];
	$orders = explode(",", $orders);


	$whr = "";
	foreach ($orders as $value) {
		$whr .= "'".$value."',";
	}
	$whr = substr($whr, 0,-1);
	$whr = "or_id IN (".$whr.")";
	$orders = $db->select("tbl_order","*",$whr);

	//get user details
	$whr = "email='".$checkout['rows'][0]['u_email']."'";
	$user = $db->select("users","*",$whr);

	//get shipping address
	$address = $db->select("address","*",$whr);
	$address = $address['rows'][0];

	$checkout = $checkout['rows'][0];
	$orders = $orders['rows'];
	$user = $user['rows'][0];

	$data = ['users' => $user, 'address' => $address, 'orders' => $orders, 'checkout' => $checkout];

	$view = new Views();
	$view->render("single_order",$data,"admin/");