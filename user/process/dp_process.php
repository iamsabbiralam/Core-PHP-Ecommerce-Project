<?php
	require("inc.php");

	$post_value = [
		["u_pic","image:image_required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../updatedp.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".Session::getValue("email")."'";
		$new_path = "../../assets/images/user_dp/";
		$get_pic = $db->select("users","u_pic",$where);
		/*print_r($get_pic['rows'][0]);
		exit();*/
		if($get_pic['count'] > 0){
			unlink($new_path.$get_pic['rows'][0]['u_pic']);
		}
		$new_path = "../../assets/images/user_dp/";
			if(!move_uploaded_file($_FILES['u_pic']['tmp_name'],$new_path.$_FILES['u_pic']['name'])){
				header("location:../profile.php?msg=Image uploading error");
				exit();
			}
			else{
		$_POST['u_pic'] = $_FILES['u_pic']['name'];
		$user_dp = $db->update("users",$_POST,$where);
		if($user_dp){
			header("location:../profile.php?msg=Image upload successfully");
		}
	}
}