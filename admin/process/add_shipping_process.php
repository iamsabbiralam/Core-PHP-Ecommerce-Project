<?php
	require("inc.php");

	$post_value = [
		["s_country","required"],
		["s_city","required"],
		["s_rate","required"],
		["s_time","required"],
		["s_method","required"]
	];

	$validate = new Validation($post_value);
	if($validate->isError()){
		header("location:../add_shipping.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "s_city='".$_REQUEST['s_city']."'";
		$get_shipping = $db->select("shipping","*",$where);
		if($get_shipping['count'] > 0){
			header("location:../add_shipping.php?msg=Shipping already exist");
		}
		else{
			$db->insert("shipping",$_POST);
			header("location:../all_shipping.php?msg=Shipping add successfully");
		}
	}
?>