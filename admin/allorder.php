<?php
	require("inc.php");


	$db = new Model();	
	$get_order = $db->select("tbl_checkout","*");

	$view = new Views();
	$view->render("allorder",$get_order,"admin/");