<?php
	require("inc.php");

$arg = [
	["pid","required"],
	["qty","required"]
];
/*print_r($_POST);
exit();*/

$validate = new Validation($arg);

if($validate->isError()){
	header("location:../../index.php?msg=".$validate->isError());
}
else{
	$db = new Model();
	$where = "pid='".$_REQUEST['pid']."'";
	$get_data = $db->select("products","p_name,p_price,p_stock",$where);
/*	print_r($get_data);
	exit();*/
		if($get_data['count'] > 0){
			if($get_data['rows'][0]['p_stock'] < $_POST['qty']){
				header("location:../../index.php?msg=Out of Order");
				exit();
			}

			$_POST['u_email'] = Session::getValue("email");
			$_POST['p_name'] = $get_data['rows'][0]['p_name'];
			$_POST['p_price'] = $get_data['rows'][0]['p_price'];
			$_POST['price_total'] = $get_data['rows'][0]['p_price'] * $_POST['qty'];

		if($db->insert("cart",$_POST)){
			header("location:../../cart.php");
		}
		else{
			header("location:../../single_pro.php?msg=Error");
		}
	}
	else{
		header("location:../../index.php?msg=Error");
	}
}
