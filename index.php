<?php require("public/inc.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
<?php require("public/header.php"); ?>
<?php
	if(!isset($_GET['cid'])){
		$data = $db->select("products","*");

	foreach ($data['rows'] as $val) {
	?>
		<li class='prd'>
			<a href="single_pro.php?pid=<?php echo $val['pid']; ?>"><img src="assets/products/<?php echo $val['p_pic']; ?>" height="150"></a><br>
			<?php echo $val['p_name']; ?><br>
			<strong>Price: </strong><?php echo $val['p_price']; ?><br>
			<strong>Stock: </strong><?php echo $val['p_stock']; ?><br>

			<?php
				if($val['p_stock'] == 0){
					echo '<strong style="color:red;">Out of Stock</strong>';
				}
				else{
			?>

			<form action="public/process/cart_process.php" method="post">
				<input type="hidden" name="pid" value="<?php echo $val['pid']; ?>">
				<input type="hidden" name="qty" value="1">
				<input type="submit" value="Add to cart">
			</form>
			<a href="single_pro.php?pid=<?php echo $val['pid']; ?>">View</a>
		</li>
	<?php } ?>
	<?php
	}
}
else{
		// $cid = $categories['rows'][0]['cid'];
		$cid = $_GET['cid'];

	$arg = [
		"cols" => "*",
		"tables" => ["categories", "products"],
		"join" => "categories.cid=products.cid",
		"where" => [
			["categories.cid","=",$cid]
		]
	];

	$products = $db->innerJoin($arg);

	foreach ($products['rows'] as $value) {
	?>
	<li class='prd'>
		<img src="assets/products/<?php echo $value['p_pic']; ?>" height="100"><br>
		<?php echo $value['p_name']; ?><br>
		<strong>Price: </strong><?php echo $value['p_price']; ?><br>
		<strong>Stock: </strong><?php echo $value['p_stock']; ?><br>

		<?php
				if($value['p_stock'] == 0){
					echo '<strong style="color:red;">Out of Stock</strong>';
				}
				else{
			?>

		<form action="public/process/cart_process.php" method="post">
			<input type="hidden" name="pid" value="<?php echo $val['pid']; ?>">
			<input type="hidden" name="qty" value="1">
			<input type="submit" value="Add to cart">
		</form>
		<a href="single_product.php?pid=<?php echo $value['pid']; ?>">View</a>
	</li>
<?php } ?>
<?php } ?>
</ul>
<?php } require("public/footer.php"); ?>