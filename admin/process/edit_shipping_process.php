<?php
	require("inc.php");

	$post_value = [
		["sid","required"],
		["s_country","required"],
		["s_city","required"],
		["s_rate","required"],
		["s_time","required"],
		["s_method","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../edit_shipping.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "sid='".$_REQUEST['sid']."'";
		$get_paymethod = $db->update("shipping",$_POST,$where);
		if($get_paymethod){
			header("location:../all_shipping.php?msg=Update Successfully");
		}
		else{
			header("location:../edit_shipping.php?msg=Error");
		}
	}