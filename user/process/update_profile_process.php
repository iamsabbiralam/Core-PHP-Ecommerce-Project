<?php
	require("inc.php");

	$post_value = [
		["fullname","required"],
		["phone","required"],
		["dob","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../updateprofile.php?msg=".$validate->isError());
	}else{
		$where = "email='".Session::getValue("email")."'";
		$db = new Model();
		$get_data = $db->update("users",$_POST,$where);

		if($get_data){
			header("location:../profile.php?msg=Profile updated");
		}
		else{
			header("location:../updateprofile.php?msg=Error");
		}
	}