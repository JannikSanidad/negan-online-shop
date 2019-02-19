<!DOCTYPE html>
<html>
<head>
	<title>Home | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	<!-- HTML CODE FOR THE HEADER -->
	<?php include 'header.php';?>

	<!-- HTML CODE FOR THE SUB-HEADER -->
	<?php include 'subh_logout.php';?>

	<section>
		<div id="showcase">
			<div id="buttons">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
			</div>
			<a href="shop.php"><img src="" id="insert"></a>
		</div>
	</section>
	
<?php include 'newsletter.php';?>

	<section id="main-section">
		<div class="container">
			<h1>Follow the Latest Trends</h1>
			<div id="box-container">
				<a href="shop.php">
					<div class="box">
						<i class="fa fa-shopping-bag box-icons"></i>
						<h2>Buy our products</h2>
						<p>Wide variety of fandom shirts for sale.</p>
					</div>
				</a>
				<a href="customize.php">
					<div class="box">
						<i class="fa fa-handshake-o box-icons"></i>
						<h2>Customize</h2>
						<p>You design. We print</p>
					</div>
				</a>
					
			</div>
		</div>
	</section>
	<section id="bestsellers">
		<div class="container">
			<h1 id="section-headline">Bestsellers</h1>
			<div id="product-container">
				<div class="img-box" onclick="openmodal('ST001','Php 300.00')">
					<div class="box-top">
						<img src="./categories/Stranger Things/img/ST001.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">ST001</h1>
						<h2 class="product-price">Php 300.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('ST002','Php 300.00')">
					<div class="box-top">
						<img src="./categories/Stranger Things/img/ST002.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">ST002</h1>
						<h2 class="product-price">Php 300.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('GOT001','Php 329.00')">
					<div class="box-top">
						<img src="./categories/Game of Thrones/img/GOT001.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">GOT001</h1>
						<h2 class="product-price">Php 329.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('GOT002','Php 329.00')">
					<div class="box-top">
						<img src="./categories/Game of Thrones/img/GOT002.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">GOT002</h1>
						<h2 class="product-price">Php 329.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('TWD001','Php 300.00')">
					<div class="box-top">
						<img src="./categories/The Walking Dead/img/TWD001.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">TWD001</h1>
						<h2 class="product-price">Php 300.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('SN001','Php 259.00')">
					<div class="box-top">
						<img src="./categories/Supernatural/img/SN001.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">SN001</h1>
						<h2 class="product-price">Php 259.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('ST003','Php 300.00')">
					<div class="box-top">
						<img src="./categories/Stranger Things/img/ST003.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">ST003</h1>
						<h2 class="product-price">Php 300.00</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('RAM001','Php 299.99')">
					<div class="box-top">
						<img src="./categories/Rick and Morty/img/RAM001.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">RAM001</h1>
						<h2 class="product-price">Php 299.99</h2>
					</div>
				</div>
				<div class="img-box" onclick="openmodal('RAM002','Php 299.99')">
					<div class="box-top">
						<img src="./categories/Rick and Morty/img/RAM002.png" class="grow">
					</div>
					<div class="box-bottom">
						<h1 class="product-name">RAM002</h1>
						<h2 class="product-price">Php 299.99</h2>
					</div>
				</div>

				<div class="modal" id="myModal">
					<div class="modal-content">
						<img src="./img/Plain_T.png">
						<div id="table-info">
							<p>Product Information</p>
							<table>
								<tr>
									<td>Product Code</td>
									<td id="insert-code"></td>
								</tr>
								<tr>
									<td>Price</td>
									<td id="insert-price"></td>
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
	<?php include 'footer.php';?>
	
	<script type="text/javascript">

		//COLOR THE CURRENT TAB
		updateCurrentTab();
		function updateCurrentTab(){
			var menus = document.getElementById("menu");
			menus = menus.getElementsByTagName("li");

			for(i=0;i<menus.length;i++){
				menus[i].className = "";
			}

			menus[0].className = "current";
		}

		// CAROUSEL

		var slideIndex = 1;
		window.onload = showSlides();

		function currentSlide(n) {
			if(n != slideIndex)
				slideIndex = n;
			showSlides();
		}

		function showSlides(){
			var dots = document.getElementsByClassName("dot");
			var insert = document.getElementById("insert");

			for(var i=0;i<dots.length;i++){
				dots[i].className = dots[i].className.replace(" active", "");
			}

			insert.src = "img/headline"+slideIndex+".jpg";

			insert.style.width = "1000px";
			insert.style.height = "500px";
			dots[slideIndex-1].className += " active";

			if(slideIndex === 1)
				slideIndex = 2;
			else
				slideIndex = 1;

			setTimeout(showSlides, 5000);
		}

		var modal = document.getElementById("myModal");

		function openmodal(product_name,product_price){
			var code = document.getElementById("insert-code");
			var price = document.getElementById("insert-price");
			code.innerHTML = product_name;
			price.innerHTML = product_price;
			modal.style.display = "block";
		}

		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		        content.style.display = "none";
		    }

		    if (event.target == accountModal){
		    	accountModal.style.display = "none";
		    }
		}

		function exitModal(){
			modal.style.display = "none";
		}

	</script>

	<!-- PHP CODE FOR THE NEWSLETTER -->
	<?php
		if (isset($_POST['submit'])) {
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

			$sql = "SELECT email FROM tbl_newsletter";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");

			$email = $_POST['email'];
			$status = 0;

			while($email_row = mysqli_fetch_array($result)){
				if($email === $email_row['email']){
					$status = 1;
				}
			}

			if($status === 0){
				$sql = "INSERT INTO tbl_newsletter VALUES ('".$email."')";
				$result = mysqli_query($conn,$sql);	

				echo '
					<script type="text/javascript">
						alert("You are now subscribed to our newsletter!");
					</script
				';	
			}
			else{
				echo '
					<script type="text/javascript">alert("You are already subscribed!");</script>
				';
			}
	
	  	}
	?>

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
			while($username_row = mysqli_fetch_array($result)){
				if($username === $username_row['username']){
					$status = 1;
				}
			}

			if($status === 0){
				$sql = "INSERT INTO `tbl_account` (`id`, `username`, `password`) VALUES (NULL, '$username', '$password')";
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

			$sql = "SELECT * FROM tbl_account WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");
			$status = 0;
		
			if(!$username_row = mysqli_fetch_array($result)){
				echo '
					<script type="text/javascript">
						alert("Username or password is incorrect!");
					</script>
				';	
			}
			else {
				$_SESSION['uid'] = $username_row['username'];
			}
			if($_SESSION['uid'] == "admin")
				echo '<meta http-equiv="refresh" content="0; URL=\'././admin/admin.php\'"/>';
			else
				echo '<meta http-equiv="refresh" content="0; URL=\'./index.php\'"/>';
		}
	?>

<?php
	if(isset($_POST["logout"])){
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=\'./index.php\'"/>';	
	}
?>
</body>
</html>