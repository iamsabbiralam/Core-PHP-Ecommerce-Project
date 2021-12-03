<?php
	require("inc.php");

	$post_value = [
		["a_pic","image:image_required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../uploadpic.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "email='".Session::getValue("email")."'";
		$new_path = "../../assets/images/user_dp/";
		$get_pic = $db->select("admin","a_pic",$where);
		/*print_r($get_pic['rows'][0]);
		exit();*/
		if($get_pic['count'] > 0){
			unlink($new_path.$get_pic['rows'][0]['a_pic']);
		}
		$new_path = "../../assets/images/user_dp/";
			if(!move_uploaded_file($_FILES['a_pic']['tmp_name'],$new_path.$_FILES['a_pic']['name'])){
				header("location:../dashboard.php?msg=Image uploading error");
				exit();
			}
			else{
		$_POST['a_pic'] = $_FILES['a_pic']['name'];
		$user_dp = $db->update("admin",$_POST,$where);
		if($user_dp){
			header("location:../dashboard.php?msg=Image upload successfully");
		}
	}
}