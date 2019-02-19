<?php
	session_start();
	$uid = "";
	if(isset($_SESSION['uid']))
		$uid = $_SESSION['uid'];

	echo '
		<div id="sub-header">
			<div class="container">
				<div id="search">
					<form>
						<input type="text" placeholder="Search" name="search">
						<i class="fa fa-search" id="search-icon"></i>
					</form>

				</div>
				<nav id="account">
					<ul>
						<li class="button_1" onclick="openAccountModal(\'signup\')">Sign Up</li>
						<li class="button_2" onclick="openAccountModal(\'login\')">Login</li>
					</ul>
				</nav>
				<nav id="logged-in">
					<ul>
						<form method="post">
							<li><i class="fa fa-shopping-cart cart"></i></li>
							<li class="username">'.$uid.'</li>
							<li><input type="submit" value="Logout" name="logout" class="logout-button button_1"></li>
						</form>
					</ul>
				</nav>

				<div class="modal" id="signup-modal">
					<div class="signup-modal-content">
						<form method="POST">
							<h1>Sign up</h1>
							<input type="text" placeholder="Username" name="username"><br>
							<input type="password" placeholder="Password" name="password"><br>
							<input type="submit" value="Create Account" name="signup"><br>
							<p>Already have an account? <a href="#" onclick="openNewModal(\'login\')">Sign in</a></p>
						</form>
					</div>
				</div>
				<div class="modal" id="login-modal">
					<div class="login-modal-content">
						<form method="POST">
							<h1>Login</h1>
							<input type="text" placeholder="Username" name="username"><br>
							<input type="password" placeholder="Password" name="password"><br>
							<input type="submit" value="Login" name="login">
							<p>Don\'t have an account? <a href="#" onclick="openNewModal(\'signup\')">Sign up</a><p>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			var accountModal;
// OPEN FORM
			function openAccountModal(x){
				if(x === "signup")
					accountModal = document.getElementById("signup-modal");
				else
					accountModal = document.getElementById("login-modal")

				openModal(accountModal)
			}

			function openModal(accountModal){
				accountModal.style.display = "block";
			}

// OPEN ANOTHER

			function openNewModal(x){
				accountModal.style.display = "none";

				if(x === "signup")
					accountModal = document.getElementById("signup-modal");
				else
					accountModal = document.getElementById("login-modal")

				openModal(accountModal)
			}

			window.onclick = function(event) {
			    if (event.target == accountModal) {
			        accountModal.style.display = "none";

			    }
			}

			function exitModal(){
				accountModal.style.display = "none";
			}

			function logout(){

			}
		</script>
	';

	if(isset($_SESSION['uid'])){

		echo '
			<script type="text/javascript">
				var x = document.getElementById("account");
				var y = document.getElementById("logged-in");

				x.style.display = "none";
				y.style.display = "block";
			</script>
		';
		$uid = $_SESSION['uid'];
	}
?>