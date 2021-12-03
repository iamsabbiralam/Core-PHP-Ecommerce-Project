<?php
 require("inc.php");

 $post_value = [
 	["pay_id","required"]
 ];
 $validate = new Validation($post_value);

 if($validate->isError()){
 	header("Location:../all_payment.php?msg=".$validate->isError());
 }
 else{
 	$db = new Model();
 	$where = "pay_id='".$_REQUEST["pay_id"]."'";
 	$get_pay = $db->delete("paymethod",$where);
 	if($get_pay){
 		header("location:../all_payment.php?msg=Deleted Successfully");
 	}
 	else{
 		header("location:../all_payment.php?msg=Error");
 	}
 }