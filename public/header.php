<link rel='icon' href="assets/images/logo.png">
	</link>
	<style type="text/css">
		.prd{
			float: left;
			margin: 5px;
			padding: 5px;
			border: 1px solid #ccc;
			text-align: center;
			list-style-type: none;
		}
		body {
		  background-image: url("assets/images/bg.jpg");
		}
	</style>
</head>
<body>
	<?php require("public/nav.php"); echo '<hr>'; ?>
	<table>
		<tr>
			<td><a href="index.php"><img src="assets/images/logo.png" height="290"></a></td>
			<td><img src="assets/images/banner.png" height="290" width="1050"></td>
		</tr>
		<tr>
			<td>
				<ul>
					<?php
						foreach ($categories['rows'] as $value) {
							echo "<li><a href='index.php?cid=".$value["cid"]."'>".$value["cat_name"]."</a></li>";
						}
					?>
				</ul>
			</td>
			<td>