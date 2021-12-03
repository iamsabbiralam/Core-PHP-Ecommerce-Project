<?php
	require("inc.php");

	$post_value = [
		["pid","required"],
		["cid","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:all_products.php?msg=".$validate->isError()."");
	}
	else{
		$db = new Model();
		$where = "pid='".$_REQUEST['pid']."'";
		$product = $db->select("products","*",$where);

/*	echo '<pre>';
print_r($data);
echo '</pre>';
 	exit();*/

	 	//$whr = "cid='".$_REQUEST['cid']."'";
	 	$categories = $db->select("categories","*");

	 /*	echo '<pre>';
	print_r($categories);
	echo '</pre>';
	 	exit();*/

	 	$data = [
	 		'products' => $product, 'categories' => $categories
	 	];

	/*echo '<pre>';
	print_r($data);
	echo '</pre>';
	 	exit();*/
 	
		$view = new Views();
		$view->render("edit_product",$data,"admin/");
	}