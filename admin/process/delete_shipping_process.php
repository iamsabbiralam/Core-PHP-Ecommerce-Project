<?php
	require("inc.php");

	$post_value = [
		["sid","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../all_shipping.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "sid='".$_REQUEST["sid"]."'";
		$shipping = $db->delete("shipping",$where);

		if($shipping){
			header("location:../all_shipping.php?msg=Deleted Successfully");
		}
		else{
			header("location:../all_shipping.php?msg=Error");
		}
	}