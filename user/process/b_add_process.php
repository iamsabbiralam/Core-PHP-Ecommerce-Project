<?php
	require("inc.php");

	$post_value = [
		["address","required"],
		["city","required"],
		["country","required"]
	];

	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	exit();*/

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../b_address.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".Session::getValue("email")."'";
		$update_address = $db->update("address",$_POST,$where);
		if($update_address){
			header("location:../../cart.php?msg=Shipping Address Updated");
		}
		else{
			header("location:../../cart.php?msg=Failed");
		}
	}