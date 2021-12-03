<?php
	require("../../conn/database.php");
	require("../../model/model.php");
	require("../../classess/validation.php");
	require("../../classess/session.php");

	$post_value = [
		["email","email:required"],
		["pwd","password:required"],
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../index.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$pwd = md5($_REQUEST['pwd']);
		$where = "email='".$_REQUEST['email']."' AND pwd='".$pwd."'";
		$data = $db->select("users","email",$where);

		if($data['count'] > 0){
		Session::init();
		Session::setValue("email",$_REQUEST['email']);
		header("location:../profile.php?msg=Login Successfull");
		}
		else{
			header("location:../index.php?msg=Error");
		}
	}
