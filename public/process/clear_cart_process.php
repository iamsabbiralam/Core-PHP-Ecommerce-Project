<?php
	require("inc.php");

	$db = new Model();
	$where = "u_email='".Session::getValue("email")."'";
	$clear_cart = $db->delete("cart",$where);

	if($clear_cart){
		header("location:../../cart.php");
	}