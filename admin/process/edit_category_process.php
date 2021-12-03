<?php
	require("inc.php");

	$post_value = [
		["cid","required"],
		["cat_name","required"],
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../edit_category.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "cid='".$_REQUEST["cid"]."'";
		$categories = $db->update("categories",$_POST,$where);

		if($categories){
		header("location:../all_categories.php?msg=Update Successfully");
	}
}