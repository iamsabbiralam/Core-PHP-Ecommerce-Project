<?php
 require("inc.php");

 $post_value = [
 	["pid","required"]
 ];

 $validate = new Validation($post_value);

 if($validate->isError()){
 	header("location:all_products.php?msg=".$validate->isError());
 }
 else{
 	$db = new Model();
 	$where = "pid='".$_REQUEST['pid']."'";
 	$data = $db->select("products","*",$where);
 	$val = $data['rows'][0];

 	unlink("../../assets/products/".$val['p_pic']);

 	$db->delete("products",$where);
 	header("location:../all_products.php?msg=Deleted successfully");
 }
?>