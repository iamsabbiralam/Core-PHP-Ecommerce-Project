<?php
	require("../../conn/database.php");
	require("../../model/model.php");
	require("../../classess/validation.php");
	require("../../classess/mail.php");

$post_value = [
	["email","email:required"],
];

$validate = new Validation($post_value);

if($validate->isError()){
	header("location:../forgetpass.php?msg=".$validate->isError());
}
else{
	$db = new Model();
	$where = "email='".$_REQUEST['email']."'";
	$get_email = $db->select("users","*",$where);

	if($get_email['count'] > 0){
		
		$token = $get_email['rows'][0]['token'];

		$arg = [
			"email" => $_POST['email'],
			"subject" => "varifay mail",
			"path" => "user/passgenerate.php",
			"body" => "varify your account",
			"token" => $token
		];
		$email = new Mail;
		$email->sendMail($arg);
		header("location:../resend.php");
	}
	else{
		header("location:../forgetpass.php?msg=Something went wrong");
	}
}