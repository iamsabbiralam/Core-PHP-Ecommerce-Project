<?php
	require("inc.php");

	$post_value = [
		["pay_id","required"],
		["pay_method","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../edit_paymethod.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "pay_id='".$_REQUEST['pay_id']."'";
		$get_paymethod = $db->update("paymethod",$_POST,$where);
		
		header("location:../all_payment.php?msg=Update Successfully");
	}