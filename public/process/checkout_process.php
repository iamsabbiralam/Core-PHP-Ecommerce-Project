<?php
	require("inc.php");

	$post_value = [
		["shipping_cost","required"],
		["final_total","required"],
		["pay_method","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../index.php?msg=".$validate->isError());
	}
	else{
		$get_time = date('Y-m-d H:i:s');
		$get_email = Session::getValue("email");
		$order_ids = "";

		$db = new Model();
		$where = "u_email='".$get_email."'";
		$get_cart = $db->select("cart","u_email,pid,p_name,p_price,qty,price_total",$where);

		foreach ($get_cart['rows'] as $value) {
			$value['order_time'] = $get_time;

			$db->insert("tbl_order",$value);

			$whr = "pid='".$value['pid']."'";
			$get_product_qty = $db->select("products","p_stock",$whr);

			$current_qty = ($get_product_qty["rows"][0]['p_stock'] - $value['qty']);
			$col_data = ["p_stock" => $current_qty];

			$db->update("products",$col_data,$whr);
		}

		$db->delete("cart",$where);

		$where = "u_email='".$get_email."' AND order_time='".$get_time."'";
		$get_order = $db->select("tbl_order","or_id",$where);

		foreach ($get_order["rows"] as $value) {
			$order_ids .= $value['or_id'].",";
			}
			
			$order_ids = substr($order_ids, 0,-1);

			$_POST['order_ids'] = $order_ids;
			$_POST['u_email'] = $get_email;
			$_POST['order_status'] = 'pending';
			$_POST['checkout_time'] = $get_time;
		
		if($db->insert("tbl_checkout",$_POST)){

		$where = "u_email='".$get_email."' AND checkout_time='".$get_time."'";
		$get_checkout = $db->select("tbl_checkout","ch_id",$where);
		$ch_id = $get_checkout['rows'][0]['ch_id'];

		$col_data = ["ch_id" => $ch_id , "pay_method" => $_POST['pay_method'] , "trans_time" => $get_time];

		$db->insert("tbl_transections",$col_data);
		header("location:../../index.php?msg=Thanks for purchasing.");
	}

	else{
		header("location:../../index.php?msg=Error");
	}
}