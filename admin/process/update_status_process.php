<?php
 require("inc.php");

 $post_value = [
 	["ch_id","required"],
 	["order_status","required"]
 ];

 $validate = new Validation($post_value);

 if($validate->isError()){
 	header("location:../single_order.php?msg=".$validate->isError());
 }
 else{
 	$db = new Model();
 	$arg = ["order_status"=>$_REQUEST['order_status']];
 	/*echo '<pre>';
 	print_r($arg);
 	echo '</pre>';
 	exit();*/
 	$where = "ch_id='".$_REQUEST['ch_id']."'";

 	if($db->update("tbl_checkout",$arg,$where)){
 		header("location:../single_order.php?ch_id=".$_REQUEST['ch_id']."");
 	}
 	else{
 		header("location:../single_order.php?msg=Failed");
 	}
 }
?>