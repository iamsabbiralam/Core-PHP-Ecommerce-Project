<?php
	require("inc.php");

	$post_value = [
		["crt_id","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../../cart.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "crt_id='".$_REQUEST["crt_id"]."'";
		$del_cart = $db->delete("cart",$where);
		if($del_cart){
			header("location:../../cart.php");
		}
	}