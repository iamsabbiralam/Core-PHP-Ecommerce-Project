<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload Profile Picture</title>
<?php require("inc/header.php"); ?>
<h2 style="color:purple" align="center">Upload Profile Picture</h2>
<form action="process/dp_process.php" method="post" enctype="multipart/form-data">
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
		<tr>
			<td>Upload Picture: </td>
			<td><input type="file" name="u_pic"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Upload"></td>
		</tr>
	</table>
</form>
<?php require("inc/footer.php"); ?>