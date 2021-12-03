<?php $value = $this->data['rows'][0]; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Profile</h2>
<table align="center">
	<tr>
		<td></td>
		<td style="color:red" align="center">
			<?php
				if(isset($_GET['msg'])){
					echo $_GET['msg'];
				}
			?>km
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<?php if($value['u_pic'] != ""){
			?>
			<a href="updatedp.php"><img src="../assets/images/user_dp/<?php echo $value['u_pic']; ?>" height="120"></a>
			<?php
			}
			else{ ?>
			<a href="updatedp.php"><img src="../assets/images/dp.png" height="120"></a>
		<?php } ?>
		</td>
	</tr>
	<tr>
		<td>Full Name: </td>
		<td><?php echo $value['fullname']; ?></td>
	</tr>
	<tr>
		<td>E-mail: </td>
		<td><?php echo $value['email']; ?></td>
	</tr>
	<tr>
		<td>Mobile No: </td>
		<td><?php echo $value['phone']; ?></td>
	</tr>
	<tr>
		<td>Gender: </td>
		<td><?php echo $value['gender']; ?></td>
	</tr>
	<tr>
		<td>DOB: </td>
		<td><?php echo $value['dob']; ?></td>
	</tr>
	<tr>
		<td>Address: </td>
		<td><?php echo $value['address']; ?></td>
	</tr>
	<tr>
		<td>City: </td>
		<td><?php echo $value['city']; ?></td>
	</tr>
	<tr>
		<td>Country: </td>
		<td><?php echo $value['country']; ?></td>
	</tr>
</table>
<?php require("inc/footer.php"); ?>