<?php
	require("inc.php");

	$post_value = [
		["ch_id","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../myorder.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "ch_id='".$_REQUEST['ch_id']."'";
		$select_checkout = $db->select("tbl_checkout","*",$where);
		$select_checkout = $select_checkout['rows'][0];

		$where = "u_email='".Session::getValue("email")."' AND order_time='".$select_checkout["checkout_time"]."'";

		$order = $db->select("tbl_order","*",$where);
		$order = $order['rows'][0];

		$where = "pid='".$order['pid']."'";
		$product = $db->select("products","p_stock",$where);
		$product = $product['rows'][0];

		$get_stock = ($product['p_stock'] + $order['qty']);

		
		$get_stock = ['p_stock' => $get_stock];
		$product = $db->update("products",$get_stock,$where);

		$where = "ch_id='".$_REQUEST['ch_id']."'";
		$delete_data = $db->delete("tbl_checkout",$where);
		$where = "u_email='".Session::getValue("email")."' AND order_time='".$select_checkout["checkout_time"]."'";
		$delete_order = $db->delete("tbl_order",$where);
		if($delete_order){
			header("location:../myorder.php?msg=Order Cencel");
		}
		else{
			header("location:../myorder.php?msg=Error");	
		}
	}