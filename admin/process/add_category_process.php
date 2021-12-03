<?php
	require("inc.php");

	$post_value = [
		["cat_name","required"]
	];
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	exit();*/

	$validate = new Validation($post_value);

	if($validate->isError()){
		header("location:../../index.php?msg=".$validate->isError());
	}
	else{
		$db = new Model();
		$where = "cat_name='".$_REQUEST['cat_name']."'";
		$get_data = $db->select("categories","cat_name",$where);
		if($get_data['count'] > 0){
			header("location:../all_categories.php?msg=Category already exist");
		}
		else{
			if($db->insert("categories",$_POST)){
				header("location:../all_categories.php?msg=Category added successfully");
			}
			else{
				header("add_category.php?msg=Error");
			}
		}
	}
?>