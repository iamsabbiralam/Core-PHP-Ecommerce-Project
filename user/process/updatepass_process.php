<?php
	require("inc.php");

	$post_value = [
		["op","password:required"],
		["np","password:required"],
		["cp","password:required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../updatepass.php?msg=".$validate->iserror());
	}
	else{
		$np = $_POST['np'];
		$cp = $_POST['cp'];
		if($np == $cp){
			$op = md5($_POST['op']);

		$where = "email='".Session::getValue("email")."' AND pwd='".$op."'";
		$db = new Model();
		$user_data = $db->select("users","email",$where);

		if($user_data['count'] > 0){
			$np = md5($np);
			$_P['pwd'] = $np;
			$whr = "email='".Session::getValue("email")."'";
			$user_data = $db->update("users",$_P,$whr);
			if($user_data){
				header("location:../updatepass.php?msg=Update Successfully");
			}
			else{
				header("location:../updatepass.php?msg=Error");
			}
		}
		else{
			header("location:../updatepass.php?msg=Old password doesn't match");
		}
	}
		else{
			header("location:../updatepass.php?msg=New password does't match");
		}
	}