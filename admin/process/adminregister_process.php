<?php
	require("inc.php");

	$post_value = [
		["name","required"],
		["email","email:required"],
		["pass","password:required"],
		["phone","required"],
		["address","required"],
		["role","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../admin_register.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".$_REQUEST['email']."'";
		$get_data = $db->select("admin","email",$where);
		if($get_data['count'] > 0){
			header("location:../admin_register.php?msg=Already a member");
		}
		else{
			$_POST['pass'] = md5($_REQUEST['pass']);
			
			if($db->insert("admin",$_POST)){
				header("location:../adminlist.php?msg=Register successfull. Please login");
			}
			else{
				header("location:../adminlist.php?msg=Registration failed");
			}
		}
	}