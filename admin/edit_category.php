<?php
	require("inc.php");

	$post_value = [
		["cid","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:all_categories.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "cid='".$_REQUEST['cid']."'";
		$categories = $db->select("categories","*",$where);

		$view = new Views();
		$view->render("edit_category",$categories,"admin/");
	}