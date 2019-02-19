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
							<th>Name</th>
							<th>Email</th>
							<th>Subject</th>
							<th>Message</th>
						</tr>
					</table>

					<form action="admin.php" method="post">
						<input type="button" name="delete" value="Delete" onclick="deleteRecord()">
						<input type="button" name="add" value="Add" onclick="addRecord()">
						<div id="delete" style="display:none">
							<input type="text" name="name-delete" placeholder="Name">
							<input type="submit" name="submit-delete">
						</div>
						<div id="add" style="display:none;">
							<input type="text" name="name" placeholder="Name">
							<input type="text" name="email" placeholder="Email">
							<input type="text" name="subject" placeholder="Subject">
							<input type="text" name="message" placeholder="Message">
							<input type="submit" name="submit-add">
						</div>
						
					</form>
				</div>
				
			</div>
		</section>

	<script type="text/javascript">
		function createBox(name,email,subject,text){
			var container = document.getElementById("append");
			var str_createBox = "<tr>"+
									"<td>"+name+"</td>"+
									"<td>"+email+"</td>"+
									"<td>"+subject+"</td>"+
									"<td>"+text+"</td>"+
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

		$sql = "SELECT * FROM tbl_feedback";
		$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");


		while($feedback_row = mysqli_fetch_array($result)){
			$name = $feedback_row["name"];
			$email = $feedback_row["email"];
			$subject = $feedback_row["subject"];
			$message = $feedback_row["message"];

			$call = "<script type='text/javascript'>createBox('$name','$email','$subject','$message');</script>";
			echo $call;
		}
	?>

	<?php
		if (isset($_POST["submit_delete"])){
			$name = $_POST['name-delete'];
			$sql = "DELETE FROM `tbl_feedback` WHERE `tbl_feedback`.`name` = $name";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	<?php
		if (isset($_POST['submit-add'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$sql = "INSERT INTO `tbl_feedback` (`name`, `email`, `subject`,'message') VALUES ('$name', '$email', '$subject','message')";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	
</body>
</html>