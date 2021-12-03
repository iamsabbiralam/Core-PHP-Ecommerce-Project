<?php
	require("inc.php");

	$db = new Model();
	$categories = $db->select("categories","*");

	$view = new Views();
	$view->render("all_categories",$categories,"admin/");
?>