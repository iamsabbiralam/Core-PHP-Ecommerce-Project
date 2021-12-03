<?php
	require("inc.php");

	$db = new Model();

	// $arg = [
	// 	"cols" =>"tbl_1.col1,tbl_2.col1,tbl_1.col2",
	// 	"tables" => ["tbl_1","tbl_2"],
	//  "join" => "tbl_1.col=tbl_2.col",
	// 	"where" => [
	// 		["columns","operator","value"],
	// 		["columns","operator","value"],
	// 		["columns","operator","value"],
	// 	],
	// 	"logical" => ["opt1","opt2"]

	$arg = [
		"cols" => "*",
		"tables" => ["products","categories"],
		"join" => "products.cid=categories.cid",
	];

	$get_products = $db->innerJoin($arg);

	$view = new Views();
	$view->render("all_products",$get_products,"admin/");
?>