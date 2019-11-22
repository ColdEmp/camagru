<?php
	include_once './header.php';
	user_logged_redirect();
?>
	<link rel="stylesheet" href="../style/login.css">
  <head>
    <title>Camagru</title>
  </head>
  <body>
	<!-- Hero Banner-->
   	<div class="hero has-background-grey-dark has-text-centered">
		<a href = "../index.php" class = "button is-outlined hbutton">Home</a>
    	<h1 class="title is-1 has-text-light">CAMAGRU</h1>
	 	<p class="subtitle has-text-light">A social media app!</p>
	</div>
	<section class="section is-centered">
	<!-- Main body -->
		<div class="columns">
			<!--Side Menu-->
			<div class="column" style = "width : 0% !important">
			</div>
			<!-- END OF SIDE MENU -->
			<!-- LOGIN -->
			<div class="column">
				<div style = "padding : 0px 0px 20px 0px">
				<div class="box has-text-centered has-background-grey-dark" id = "loginbox">
					<h1 class="title is-3 has-text-light">LOGIN</h1>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="field">‰
							<div class="control">
									<input class="input is-large" type="text" name = "log_name" placeholder="Username">
							</div>
						</div>
						<div class="field">
							<div class="control">
								<input class="input is-large" type="password" name = "log_pass"placeholder="Password">
							</div>
						</div>
						<div>
							<button class="button" id = "loginbutton" name = "login" value = "login">Login</button>
							<a href="./signup.php" class="button" id = "signupbutton">Sign up</a>
						</div>
					</form>
				</div>
</div>
				<?php
					if (isset($_POST["login"]))
					{
						if(valid_login($_POST['log_name'], $_POST['log_pass'])){
						$_SESSION["username"] = $_POST["log_name"];
						$rawpass = $_POST["log_pass"];
						header("Location: ../index.php");
						}
						else
						{
							echo "";
							notify('Invalid username password combination');
						}
					}
				?>
			</div>
			<!-- END OF LOGIN -->
			<div class="column"></div>
		</div>
		<!-- <div class="box has-background-grey">
			<h1 class="title is-3">Login</h1>
		</div> -->
	</section>
	<footer class="credits has-background-grey">
		<div class="content has-text-centered has-text-light">
			<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
			 <a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
		</div>
	</footer>
  </body>
</html>