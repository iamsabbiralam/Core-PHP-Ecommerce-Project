<?php
	require("../../conn/database.php");
	require("../../model/model.php");
	require("../../classess/validation.php");
	require("../../classess/session.php");
	require("../../classess/mail.php");

	$post_value = [
		["fullname","required"],
		["email","email:required"],
		["pwd","password:required"],
		["phone","required"],
		["gender","required"],
		["dob","required"],
		["address","required"],
		["city","required"],
		["country","required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../register.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".$_REQUEST['email']."'";
		$get_data = $db->select("users","email",$where);
		if($get_data['count'] > 0){
			header("location:../index.php?msg=Already a member");
		}
		else{
			$_POST['pwd'] = md5($_REQUEST['pwd']);
			$_POST['token'] = md5($_REQUEST['email'] . date("Y-m-d H:i:s"));
			$_POST['status'] = "pending";
			$_POST['r_Time'] = date("Y-m-d H:i:s");
			
			if($db->insert("users",$_POST)){
				header("location:../index.php?msg=Register successfull. Please login");
			}
			else{
				header("location:../register.php?msg=Registration failed");
			}

			$arg = [
			"email" => $_POST['email'],
			"subject" => "varifay mail",
			"path" => "user/verify.php",
			"body" => "varify your account",
			"token" => $token
			];
			$email = new Mail;
			$email->sendMail($arg);

			$_P['email'] = $_REQUEST['email'];
			$_P['address'] = $_REQUEST['address'];
			$_P['city'] = $_REQUEST['city'];
			$_P['country'] = $_REQUEST['country'];
			
			if($db->insert("address",$_P)){
				Session::init();
				Session::setValue("email",$_REQUEST['email']);
				header("location:../profile.php?msg=Login Successfull");
			}
			else{
				header("location:../register.php?msg=failed");
			}
		}
	}