<?php
	require("inc.php");

	$post_value = [
		["p_name","required"],
		["p_price","required"],
		["p_desc","required"],
		["p_brand","required"],
		["p_stock","required"],
		["p_pic","image:image_required"]
	];

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../add_product.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "p_name='".$_REQUEST['p_name']."'";
		$get_data = $db->select("products","p_name",$where);
		if($get_data['count'] > 0){
			header("location:../add_product.php?msg=Product already exist");
		} 
		else{
			$new_path = "../../assets/products/";
			if(!move_uploaded_file($_FILES['p_pic']['tmp_name'],$new_path.$_FILES['p_pic']['name'])){
				header("location:../add_product.php?msg=Image uploading error");
				exit();
			}
			else{
				$_POST['p_pic'] = $_FILES['p_pic']['name'];
				if($db->insert("products",$_POST)){
					header("location:../all_products.php?msg=Product added successfully");
				}
				else{
					header("location:../add_product.php?msg=Error");
				}
			}
		}
	}
?>