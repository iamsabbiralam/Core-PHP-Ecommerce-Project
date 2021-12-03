<?php
	require("../conn/database.php");
	require("../model/model.php");
	require("../classess/session.php");
	require("../classess/validation.php");

	$arg = [
		["token","required"]
	];

	$validate = new Validation($arg);

	if($validate->isError()){
		header("location:index.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "token='".$_REQUEST['token']."'";
		$get_token = $db->select("users","email",$where);

		if($get_token['count'] > 0){
			$data = [
				"status" => "active"
			];

		$whr = "email='".$get_token['rows'][0]['email']."'";
		$db->update("users",$data,$whr);
		Session::init();
		Session::setValue("email",$get_token['rows'][0]['email']);
		header("location:../index.php");
		}
		else{
			header("location:index.php?msg=Token not found");
		}
	}