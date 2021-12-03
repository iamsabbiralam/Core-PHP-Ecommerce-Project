<?php require("public/inc.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Details</title>
<?php require("public/header.php"); ?>
<h2 style="color:purple" align="center">Product Details</h2>
<ul>
	<?php
		if(isset($_GET['pid'])){
			$pid =  $_GET['pid'];
		}
		else{
			header("index.php");
		}
		$arg = [
			"cols" => "*",
			"tables" => ["products","categories"],
			"join" => "products.cid=categories.cid",
			"where" => [
					["products.pid","=",$pid]
				]
		];

		$products = $db->innerJoin($arg);

		foreach ($products['rows'] as $value) {
		?>
		<li class="prd">
			<img src="assets/products/<?php echo $value['p_pic']; ?>" width="100"><br>
			<b><?php echo $value['p_name']; ?></b><br>
			Price: <?php echo $value['p_price']; ?><br>
			Description: <?php echo $value['p_desc']; ?><br>
			Brand: <?php echo $value['p_brand']; ?><br>
			Stock: <?php echo $value['p_stock']; ?><br>

			<?php
				if($value['p_stock'] == 0){
					echo '<strong style="color:red;">Out of Stock</strong>';
				}
				else{
			?>

			<form action="public/process/cart_process.php" method="post">
				<input type="hidden" name="pid" value="<?php echo $value['pid']; ?>">
				<input type="number" name="qty" value="1" min="1"><br>
				<input type="submit" value="Add to cart">
			</form>
			<?php
			}
			?>
		</li>
		<?php
		}
	?>
</ul>
<?php require("public/footer.php"); ?>