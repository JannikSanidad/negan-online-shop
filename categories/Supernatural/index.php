<!DOCTYPE html>
<html>
<head>
	<title>Shop | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/shop.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HTML CODE FOR THE HEADER -->
	<?php include './header.php';?>

	<!-- HTML CODE FOR THE SUB-HEADER -->
	<?php include '../../subh_logout.php';?>

	<section id="shop">
		<div class="container">
			<div id="sidebar">
				<h1>Categories</h1>
				<ul>
					<li><a href="../Stranger Things/index.php">Stranger Things</a></li>
					<li><a href="../Vikings/index.php">Vikings</a></li>
					<li><a href="../The Walking Dead/index.php">The Walking Dead</a></li>
					<li><a href="../The Punisher/index.php">The Punisher</a></li>
					<li><a href="../The Flash/index.php">The Flash</a></li>
					<li><a href="../Game of Thrones/index.php">Game of Thrones</a></li>
					<li><a href="../Riverdale/index.php">Riverdale</a></li>
					<li><a href="../Arrow/index.php">Arrow</a></li>
					<li><a href="../Black Mirror/index.php">Black Mirror</a></li>
					<li><a href="../Supergirl/index.php">Supergirl</a></li>
					<li><a href="../Legends of Tomorrow/index.php">Legends of Tomorrow</a></li>
					<li><a href="./index.php">Supernatural</a></li>
					<li><a href="../Greys Anatomy/index.php">Grey's Anatomy</a></li>
					<li><a href="../Mr. Robot/index.php">Mr. Robot</a></li>
					<li><a href="../Breaking Bad/index.php">Breaking Bad</a></li>
					<li><a href="../Rick and Morty/index.php">Rick and Morty</a></li>
					<li><a href="../AmericanHorrorStory/index.php">American Horror Story</a></li>
				</ul>
			</div>
			<div id="main">
				<h1 id="title">Products</h1>
				<p id="path"><a href="../../index.php">Home</a> / <a href="../../shop.php">Products</a> / Supernatural</p>
				<div id="product-container">
					
				</div>
				<div class="modal" id="myModal">
					<div class="modal-content">
						<img src="./img/Plain_T.png" id="out-img">
						<div id="table-info">
							<p>Product Information</p>
							<table>
								<tr>
									<td>Product Code</td>
									<td id="out-code"></td>
								</tr>
								<tr>
									<td>Price</td>
									<td id="out-price"></td>
								</tr>
								<tr>
									<td>Size</td>
									<td>
										<form action="/action_page.php">
											<input list="sizes" name="size">
												<datalist id="sizes">
													<option value="Small">
												    <option value="Extra Small">
												    <option value="Medium">
												    <option value="Large">
												    <option value="Extra Large">
										  		</datalist>
										</form>
									</td>
								</tr>
								<tr>
									<td>Color</td>
									<td>
										<form action="/action_page.php">
											<input list="colors" name="color">
												<datalist id="colors">
													<option value="Red">
												    <option value="Orange">
												    <option value="Yellow">
												    <option value="Green">
												    <option value="Blue">
												    <option value="Indigo">
												    <option value="Violet">
												    <option value="Black">
												    <option value="White">
												    <option value="Brown">
										  		</datalist>
										</form>
									</td>
								</tr>
							</table>
						</div>
						<div id="button-container">
							<button id="back" onclick="exitModal()">Back</button>
							<button id="add-to-cart" onclick="alert('This feature will be added soon!');">Add To Cart</button>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</section>

	<!-- HTML CODE FOR THE FOOTER -->
	<?php include '../../footer.php';?>

	<script type="text/javascript">
		var modal = document.getElementById("myModal");
				
		function openmodal(container){
			var product_id = container.getElementsByClassName("product-id");
			var price = container.getElementsByClassName("product-price");
			var category = container.getElementsByClassName("product-image");

			product_id = product_id[0].innerHTML;
			price = price[0].innerHTML;
			category = category[0].innerHTML;

			var outcode = document.getElementById("out-code");
			var outprice = document.getElementById("out-price");
			var outimg = document.getElementById("out-img");

			outcode.innerHTML = product_id;
			outprice.innerHTML = price;
			outimg.src = "./img/" + product_id + ".png";
			modal.style.display = "block";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		    if (event.target == accountModal){
		    	accountModal.style.display = "none";
		    }
		}

		function exitModal(){
			modal.style.display = "none";
		}

		function createBox(product_id,price,discount,category){
			var container = document.getElementById("product-container");
			var str_createBox = "<div class='product'>" +
									"<img src='./img/" + product_id + ".png'>" +
									"<div class='desc'>" +
										"<h1 class='product-id'>" + product_id + "</h1>" +
										"<h2 class='product-price'>Php " + price + ".00</h2>" +
										"<h2 class='product-image' style='display:none'>" + category + "</h2>" +
									"</div>" +
								"</div>";

			container.innerHTML = container.innerHTML + str_createBox;
			setBoxes(category)
		}

		function setBoxes(category){
			var container = document.getElementsByClassName("product");
			for(i=0;i<container.length;i++){
				container[i].onclick = function(){openmodal(this);}
			} 
			
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

		$sql = "SELECT * FROM tbl_product WHERE category = 'Supernatural'";
		$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");

		$category = "";

		while($product_row = mysqli_fetch_array($result)){
			$product_id = $product_row["product_id"];
			$price = $product_row["price"];
			$discount = $product_row["discount"];
			$category = $product_row["category"];
			$call = "<script type='text/javascript'>createBox('".$product_id."','".$price."','".$discount."','".$category."');</script>";
			echo $call;
		}

		echo '
			<script type="text/javascript>setBoxes("'.$category.'");</script>"
		';
	?>
<!-- SIGNUP -->
	<?php
		if (isset($_POST['signup'])) {
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

			$username = $_POST["username"];
			$password = $_POST["password"];

			$sql = "SELECT * FROM tbl_account";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
			$status = 0;
			echo $status;
			while($username_row = mysqli_fetch_array($result)){
				if($username === $username_row['username']){
					$status = 1;
				}
			}

			if($status === 0){
				$sql = "INSERT INTO tbl_account VALUES('".$username."','".$password."')";
				$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");

				echo '
					<script type="text/javascript">
						alert("You have successfully created an account!");
					</script>
				';	
			}
			else{
				echo '
					<script type="text/javascript">alert("Username is already in use!");</script>
				';
			}		
	  	}
	?>

	<?php
		if (isset($_POST['login'])) {
			echo '<script type="text/javascript">alert("This feature will be added soon!");</script>';
		}
	?>
</body>
</html>