<?php
	require("inc.php");

	$post_value = [
		["cid","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../all_categories.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "cid='".$_REQUEST["cid"]."'";
		$categories = $db->delete("categories",$where);
		$products = $db->delete("products",$where);

		header("location:../all_categories.php?msg=Deleted Successfully");
	}