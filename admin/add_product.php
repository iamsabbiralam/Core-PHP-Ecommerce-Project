<?php
	require("inc.php");

	$db = new Model();
	$categories = $db->select("categories","*");

	$view = new Views();
	$view->render("add_product",$categories,"admin/");
?>