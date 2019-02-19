<!DOCTYPE html>
<html>
<head>
	<title>Contact Us | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HTML CODE FOR THE HEADER -->
	<?php include 'header.php';?>

	<!-- HTML CODE FOR THE SUB-HEADER -->
	<?php include 'subh_logout.php';?>

	<div id="contact">
		<div class="container">
			<h1>Got any inquiries, suggestions, feedback? Send us an e-mail or call!</h1>
			<div id="info">
				<h2>Head Office</h2>
				<p>#14 Namnama<br>
				Brgy. 30 Namnama<br>
				Bacarra, Philippines, 2916</p>

				<h2>Contact Numbers</h2>

				<h3>LANDLINE:</h3>
				<p>771-7361<br>
				670-3604</p>

				<h3>MOBILE:</h3>
				<p>+63(922)810482<br>
				+63(271)581041</p>

				<h2>E-mail</h2>
				<h3>Inquiries</h3>
				<p>inquiry@neganshirts.com</p>
				<h3>Follow up orders</h3>
				<p>sales@neganshirts.com</p>
				<h3>Feedback/Reviews</h3>
				<p>feedback@neganshirts.com</p>
			</div>
			<div id="form">
				<form action="./contact.php" method="POST">
					<h2>Contact Us</h2>
					<input type="text" name="name" placeholder="Name">
					<input type="email" name="e-mail" placeholder="E-mail">
					<input type="text" name="subject" placeholder="Subject">
					<textarea placeholder="Your message here" name="message"></textarea>
					<input type="submit" name="feedback" value="Submit">
				</form>
			</div>
			<div id="map">
				<img src="./img/map.png">
			</div>
		</div>
	</div>

	

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

			menus[4].className = "current";
		}
	</script>

	<?php
		if (isset($_POST['feedback'])) {
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

			$name = $_POST["name"];
			$email = $_POST["e-mail"];
			$subject = $_POST["subject"];
			$message = $_POST["message"];

			$sql = "INSERT INTO tbl_feedback VALUES('".$count."','".$name."','".$email."','".$subject."','".$message."')";
			$result = mysqli_query($conn,$sql) or die("Error: ". mysql_error(). " with query ");

			echo '
				<script type="text/javascript">
					alert("Your message has been submitted!");
				</script>
			';	
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
			echo $status;
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
			
			echo '<meta http-equiv="refresh" content="0; URL=\'./contact.php\'"/>';
		}
	?>

	<?php
	if(isset($_POST["logout"])){
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=\'./contact.php\'"/>';	
	}
?>
</body>
</html>