<?php
	require("inc.php");

	$post_value = [
		["email","required"],
		["np","password:required"],
		["cp","password:required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../passgenerate.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".$_REQUEST['email']."'";
		$get_email = $db->select("users","*",$where);

		if($get_email['count'] > 0){

			$_POST['np'] = $np;
			$_POST['cp'] = $cp;

			if($np != $cp){
				header("location:../passgenerate.php?msg=You must enter new password twice to change it");
				exit();
			}
			else{
			$cp = md5($cp);
			$col_data = [
				"pwd" => $cp
			];
	
			if($db->update("users",$col_data,$where)){
				header("../index.php?Please login.");
			}
			else{
				header("../index.php?Please try again.");	
			}
		}
	}
	else{
		header("../register.php?Register first.");
	}
}