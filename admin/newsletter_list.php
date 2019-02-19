<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./admin.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
			<div class="container">
				<div id="branding">
					<img src="../img/logo.png">
					<h1><span class="green">N</span>egan</h1>
				</div>
				<nav id="menu">
					<ul>
						<li><a href="admin.php">Accounts</a></li>
						<li><a href="newsletter_list.php">Newsletter</a></li>
						<li><a href="customize_list.php">Customized Orders</a></li>
						<li><a href="feedback_list.php">Feedbacks</a></li>
						<li><a href="product_list.php">Products</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section>
			<div class="container">
				<div id="body">
					<h1>Admin Panel</h1>
					<table id="append" border="1px" cellspacing="0">
						<tr>
							<th>Email</th>
						</tr>
					</table>

					<form action="admin.php" method="post">
						<input type="button" name="delete" value="Delete" onclick="deleteRecord()">
						<input type="button" name="add" value="Add" onclick="addRecord()">
						<div id="delete" style="display:none">
							<input type="text" name="email-delete" placeholder="Email">
							<input type="submit" name="submit-delete">
						</div>
						<div id="add" style="display:none;">
							<input type="text" name="email" placeholder="Email">
							<input type="submit" name="submit-add">
						</div>
						
					</form>
				</div>
				
			</div>
		</section>

	<script type="text/javascript">
		function createBox(email){
			var container = document.getElementById("append");
			var str_createBox = "<tr>"+
									"<td>"+email+"</td>"+

								"</tr>";

			container.innerHTML = container.innerHTML + str_createBox;
		}

		function deleteRecord(){
			var del = document.getElementById("delete");
			var add = document.getElementById("add");
			add.style.display = "none";
			del.style.display = "block";
		}

		function addRecord(){
			var del = document.getElementById("delete");
			var add = document.getElementById("add");
			del.style.display = "none";
			add.style.display = "block";
		}
	</script>


	<?php

	    $servername = "localhost";
		$username = "root";
		$password = "";
		$database = "negan";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password,$database);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		} 

		$sql = "SELECT * FROM tbl_newsletter";
		$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");


		while($newsletter_row = mysqli_fetch_array($result)){
			$email = $newsletter_row["email"];
			$call = "<script type='text/javascript'>createBox('$email');</script>";
			echo $call;
		}
	?>

	<?php
		if (isset($_POST["submit_delete"])){
			$email = $_POST['email-delete'];
			$sql = "DELETE FROM `tbl_newsletter` WHERE `tbl_newsletter`.`email` = $email";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	<?php
		if (isset($_POST['submit-add'])){
			$email = $_POST['email'];

			$sql = "INSERT INTO `tbl_newsletter` (`email`) VALUES ('$email')";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	
</body>
</html>