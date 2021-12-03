<?php
	require("inc.php");

	$post_value = [
		["pay_method","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../add_payment.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "pay_method='".$_REQUEST['pay_method']."'";
		$get_data = $db->select("paymethod","*",$where);
		if($get_data['count'] > 0){
			header("location:../add_payment.php?msg=Payment method already exist");
		}
		else{
			$db->insert("paymethod",$_POST);
			header("location:../all_payment.php?mdg=Payment method add successfully");
		}
	}