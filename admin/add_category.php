<?php
	require("inc.php");
	
	$db = new Model();
	$where = "email='".Session::getValue("email")."'";

	$view = new Views();
	$view->render("add_category",false,"admin/");
?>