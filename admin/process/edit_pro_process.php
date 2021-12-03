<?php
 require("inc.php");

 if($_FILES['p_pic']['name'] != ""){
 	$post_value = [
 		["p_name","required"],
 		["cid","required"],
 		["p_price","required"],
 		["p_desc","required"],
 		["p_brand","required"],
 		["p_stock","required"],
 		["p_pic","image:image_required"]
 	];
 }
 else{
 	$post_value = [
 		["p_name","required"],
 		["cid","required"],
 		["p_price","required"],
 		["p_desc","required"],
 		["p_brand","required"],
 		["p_stock","required"],
 		["op_pic","required"]
 	];
 }
/*echo '<pre>';
print_r($_);
echo '</pre>';
 	exit();*/

 $validate = new Validation($post_value);

 if($validate->isError()){
 	header("location:../edit_product.php?msg=".$validate->isError()."&pid=".$_REQUEST['pid']."");
 }
 else{
 	$db = new Model();
 	$where = "pid='".$_REQUEST['pid']."'";

 	if($_FILES['p_pic']['name'] != ""){
 		$path = "../assets/products/";
 	

 	UNLINK($path.$_REQUEST['op_pic']);
 		if(!move_uploaded_file($_FILES['p_pic']['tmp_name'], $path.$_FILES['p_pic']['name'])){
 			header("location:../edit_product.php?msg=Please try again&pid=".$_REQUEST['pid']."");
 			exit();
 		}
 		 $_POST['p_pic'] = $_FILES['p_pic']['name'];

		if($db->update("products",$_POST,$where)){
			header("location:../all_products.php?msg=Update successfully");
		}
	}
	else{
		$_POST['p_pic'] = $_REQUEST['op_pic'];

		/*echo '<pre>';
print_r($_POST);
echo '</pre>';
 	exit();*/

		if($db->update("products",$_POST,$where)){
			header("location:../all_products.php?msg=Image update successfully");
		}
		else{
			header("location:../all_products.php?msg=Image upload error");
		}
	}
}