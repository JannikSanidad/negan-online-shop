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
							<th>Product_id</th>
							<th>Price</th>
							<th>Discount</th>
							<th>Category</th>
						</tr>
					</table>

					<form action="admin.php" method="post">
						<input type="button" name="delete" value="Delete" onclick="deleteRecord()">
						<input type="button" name="add" value="Add" onclick="addRecord()">
						<div id="delete" style="display:none">
							<input type="text" name="product_id-delete" placeholder="Product_id">
							<input type="submit" name="submit-delete">
						</div>
						<div id="add" style="display:none;">
							<input type="text" name="product_id" placeholder="Product Id">
							<input type="text" name="price" placeholder="Price">
							<input type="text" name="discount" placeholder="Discount">
							<input type="text" name="category" placeholder="Category">

							<input type="submit" name="submit-add">
						</div>
						
					</form>
				</div>
				
			</div>
		</section>

	<script type="text/javascript">
		function createBox(product_id,price,discount,category){
			var container = document.getElementById("append");
			var str_createBox = "<tr>"+
									"<td>"+product_id+"</td>"+
									"<td>"+price+"</td>"+
									"<td>"+discount+"</td>"+
									"<td>"+category+"</td>"+
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

		$sql = "SELECT * FROM tbl_product";
		$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");


		while($product_row = mysqli_fetch_array($result)){
			$product_id = $product_row["product_id"];
			$price = $product_row["price"];
			$discount = $product_row["discount"];
			$category = $product_row["category"];

			$call = "<script type='text/javascript'>createBox('$product_id','$price','$discount','$category');</script>";
			echo $call;
		}
	?>

	<?php
		if (isset($_POST["submit_delete"])){
			$product_id = $_POST['product_id-delete'];
			$sql = "DELETE FROM `tbl_product` WHERE `tbl_product`.`product_id` = $product_id";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	<?php
		if (isset($_POST['submit-add'])){
			$product_id = $_POST['$product_id'];
			$price = $_POST['price'];
			$discount = $_POST['discount'];
			$category = $_POST['category'];

			$sql = "INSERT INTO `tbl_product` (`product_id`, `username`, `password`, 'category') VALUES ('$product_id', '$price', '$discount','$category')";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
		}
	?>

	
</body>
</html>