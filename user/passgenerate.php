<?php
	require("../conn/database.php");
	require("../model/model.php");
	require("../classess/session.php");
	require("../classess/validation.php");
	require("../classess/view.php");

	$post_value = [
		["token","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../index.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "token='".$_REQUEST['token']."'";
		$get_token = $db->select("users","*",$where);

		$view = new Views();
		$view->render("passgenerate",$get_token,"user/");
}