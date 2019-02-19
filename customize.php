<!DOCTYPE html>
<html>
<head>
	<title>Customize | Negan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/customize.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- HTML CODE FOR THE HEADER -->
	<?php include 'header.php';?>

	<!-- HTML CODE FOR THE SUB-HEADER -->
	<?php include 'subh_logout.php';?>

	<section>
		<div class="container">
			<div id="production">
				<div class="process">
					<p><span class="number">1.</span> Send photos of your design</p>
				</div>
				<div class="process">
					<p><span class="number">2.</span> We will send a quote based on your photo</p>
				</div>
				<div class="process">
					<p><span class="number">3.</span> Working drawings will be sent for your approval</p>
				</div>
				<div class="process">
					<p><span class="number">4.</span> Production of your design will take 5-7 days</p>
				</div>
				<div class="process">
					<p><span class="number">5.</span> Full payment must be paid immediately before releasing work</p>
				</div>
				<div class="process">
					<p><span class="number">6.</span> We will deliver your custom shirt to your specified address</p>
				</div>
			</div>

			<div id="form">
				<div id="input-container">
					<p>Name<span class="red">*</span></p> 
					<input type="text" name="name">

					<p>Address Line 1<span class="red">*</span></p> 
					<input type="text" name="address-1">

					<p>Address Line 2</p> 
					<input type="text" name="address-2">

					<p>Contact Number<span class="red">*</span></p> 
					<input type="text" name="contact">

					<p>E-mail<span class="red">*</span></p> 
					<input type="email" name="email">

					<p>Details of Inquiry</p> 
					<textarea></textarea>

					<p>File Upload</p>
					<input type="file" name="file-upload">
				</div>
					
				<div id="button-container">
					<button id="clear" onclick="alert('This feature will be added soon!');">CLEAR</button>
					<button id="submit" onclick="alert('This feature will be added soon!');">SUBMIT</button>
				</div>
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

			menus[2].className = "current";
		}
	</script>

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
			
			echo '<meta http-equiv="refresh" content="0; URL=\'./customize.php\'"/>';
		}
	?>

	<?php
	if(isset($_POST["logout"])){
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=\'./customize.php\'"/>';	
	}
?>
</body>
</html>