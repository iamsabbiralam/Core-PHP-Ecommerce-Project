<?php
	require("../../conn/database.php");
	require("../../model/model.php");
	require("../../classess/session.php");
	require("../../classess/validation.php");

	$post_value = [
		["email","required:email"],
		["pass","required:password"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../index.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$pass = md5($_REQUEST['pass']);
		
		$where = "email='".$_REQUEST["email"]."' AND pass='".$pass."'";
		$get_data = $db->select("admin","email",$where);
		
		if($get_data['count'] > 0){
			Session::init();
			Session::setValue("email",$_REQUEST["email"]);
			header("location:../dashboard.php?msg=Login Successfull");
		}
		else{
			header("location:../index.php?msg=Error");
		}
	}
?>