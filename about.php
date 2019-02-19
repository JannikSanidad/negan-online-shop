<!DOCTYPE html>
<html>
<head>
	<title>About | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/about.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HTML CODE FOR THE HEADER -->
	<?php include 'header.php';?>

	<!-- HTML CODE FOR THE SUB-HEADER -->
	<?php include 'subh_logout.php';?>

	<section>
		<div class="container">
			<div id="main-content">
				<h1 id="title">Welcome to Negan!</h1>
				<p>Your one stop online shop! Negan is an online store that sells fandom shirts for all your favorite shows!</p>

				<h2>Easy and Accessible Shopping</h2>
				<p>No more traffic jams, crowds and long queues! Shop anytime, anywhere via your computer and mobile phone.
				With our quick and reliable delivery service, just sit back, relax and your package will come to you.</p>

				<h2>Safe and Secure Shopping</h2>
				<p>Understanding the importance of safe and secure shopping, we provide our customers with a broad range of secure payment options including 
				cash-on-delivery, where you pay in cash only when you receive your package.
				Be assured of product quality and authenticity: All purchases on Lazada are guaranteed to be genuine products, new, not defective or damaged. 
				If it is, simply return it within 7 days for a full refund under our Buyer Protection Program.</p>

				<h2>Quality for Free Delivery</h2>
				<p>At Negan, customers can qualify for FREE SHIPPING for orders Php995 and up NATIONWIDE. All orders below this amount have a delivery charge of only Php100. </p>

				<h2>Free Returns</h2>
				<p>Shoes and clothing sizes will always vary – if an item does not fit to your liking, Negan will accept returns within 30 days after you receive your goods.</p>

				<h2>Comprehensive and personal service</h2>
				<p>Our objective is to offer you an effortless online shopping experience so for any questions, you can reach Negan’s customer service experts via email.</p>

				<h2>Ultimate Experience</h2>
				<p>Sign up for our newsletter, join us on Facebook and follow us on Twitter to keep updated on all our latest finds, hottest looks and newest trends.</p>	
			</div>

			<div id="sidebar">
				<div id="dev-container">
					<div class="developers">
						<img src="./img/developers.png">
						<h3>John Peras</h3>
						<h4>Programmer</h4>
					</div>
					<div class="developers">
						<img src="./img/developers.png">
						<h3>John Mark Praico</h3>
						<h4>Programmer</h4>
					</div>
					<div class="developers">
						<img src="./img/developers.png">
						<h3>Jannik Earl C. Sanidad</h3>
						<h4>Programmer</h4>
					</div>
				</div>
				<!-- HTML CODE FOR THE NEWSLETTER -->
				<?php include 'newsletter.php';?>
			</div>
			
		</div>
	</section>

	<!-- HTML CODE FOR THE FOOTER -->
	<?php include 'footer.php';?>
	
	<script type="text/javascript">
		// COLOR THE CURRENT TAB
		updateCurrentTab();
		function updateCurrentTab(){
			var menus = document.getElementById("menu");
			menus = menus.getElementsByTagName("li");

			for(i=0;i<menus.length;i++){
				menus[i].className = "";
			}

			menus[3].className = "current";
		}
	</script>

	<?php
		if (isset($_POST['submit'])) {
		    $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "Negan";
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
			$database = "Negan";
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
			
			echo '<meta http-equiv="refresh" content="0; URL=\'./about.php\'"/>';
		}
	?>

	<?php
	if(isset($_POST["logout"])){
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=\'./about.php\'"/>';	
	}
?>
</body>
</html>