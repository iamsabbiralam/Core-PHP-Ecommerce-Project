<?php

	$db = new Model();
	$where = "email='".Session::getValue("email")."'";
	$role = $db->select("admin","*",$where);

	if($role['rows'][0]['role'] != "Admin"){
?>
<ul>
	<li>
		<a href="dashboard.php">DashBoard</a>
	</li>
	<li>Categories
		<ul>
			<li><a href="all_categories.php">All Categories</a></li>
			<li><a href="add_category.php">Add Category</a></li>
		</ul>
	</li>
	<li>Products
		<ul>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="add_product.php">Add Product</a></li>
		</ul>
	</li>
	<li>
		<a href="allorder.php">All Order</a>
	</li>
	<li>
		<a href="logout.php">Logout</a>
	</li>
</ul>
<?php
	}
	else{
?>
<ul>
	<li>
		<a href="dashboard.php">DashBoard</a>
	</li>
	<li>Admin Panel
		<ul>
			<li><a href="adminlist.php">All Admin</a></li>
			<li><a href="admin_register.php">Register Admin</a></li>
		</ul>
	</li>
	<li>
		<a href="user.php">Users List</a>
	</li>
	<li>Categories
		<ul>
			<li><a href="all_categories.php">All Categories</a></li>
			<li><a href="add_category.php">Add Category</a></li>
		</ul>
	</li>
	<li>Products
		<ul>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="add_product.php">Add Product</a></li>
		</ul>
	</li>
	<li>Shipping
		<ul>
			<li><a href="all_shipping.php">View Shipping</a></li>
			<li><a href="add_shipping.php">Add Shipping</a></li>
		</ul>
	</li>
		<li>Payement Method
		<ul>
			<li><a href="all_payment.php">View Payment</a></li>
			<li><a href="add_payment.php">Add Payment</a></li>
		</ul>
	</li>
	<li>
		<a href="allorder.php">All Order</a>
	</li>
	<li>
		<a href="logout.php">Logout</a>
	</li>
</ul>
<?php } ?>