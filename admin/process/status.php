<?php
 require("inc.php");

 $post_value = [
 	["u_id","required"],
 	["status","required"]
 ];

 $validate = new Validation($post_value);

 if($validate->isError()){
 	header("location:../user.php?msg=".$validate->isError());
 }
 else{
 	$db = new Model();
 	$arg = ["status"=>$_REQUEST['status']];
 	/*echo '<pre>';
 	print_r($arg);
 	echo '</pre>';
 	exit();*/
 	$where = "u_id='".$_REQUEST['u_id']."'";

 	if($db->update("users",$arg,$where)){
 		header("location:../user.php?u_id=".$_REQUEST['u_id']."");
 	}
 	else{
 		header("location:../user.php?msg=Failed");
 	}
 }
?>