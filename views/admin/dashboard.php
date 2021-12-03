<?php $value = $this->data['rows']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
</head>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Dashboard</h2>
<table align="center">
	<tr>
		<td></td>
		<td style="color:red" align="center">
			<?php
				if(isset($_GET['msg'])){
					echo $_GET['msg'];
				}
			?>
		</td>
	</tr>
	<?php
	foreach ($value as $val) {
	?>
	<tr>
		<td colspan="2" align="center">
			<?php if($val['a_pic'] != ""){
			?>
			<a href="uploadpic.php"><img src="../assets/images/user_dp/<?php echo $val['a_pic']; ?>" height="120"></a>
			<?php
			}
			else{ ?>
			<a href="uploadpic.php"><img src="../assets/images/dp.png" height="120"></a>
		<?php } ?>
		</td>
	</tr>
	<tr>
		<th>Full Name:</th>
		<td><?php echo $val['name']; ?></td>
	</tr>
	<tr>
		<th>E-mail:</th>
		<td><?php echo $val['email']; ?></td>
	</tr>
	<tr>
		<th>Phone:</th>
		<td><?php echo $val['phone']; ?></td>
	</tr>
	<tr>
		<th>Address:</th>
		<td><?php echo $val['address']; ?></td>
	</tr>
	<tr>
		<th>Role:</th>
		<td><?php echo $val['role']; ?></td>
	</tr>
	<?php
	}
	?>
</table>
<?php require("inc/footer.php"); ?>