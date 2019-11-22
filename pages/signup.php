<?php
	include_once './header.php';
	user_logged_redirect();
?>
  <head>
    <title>Camagru</title>
	<link rel="stylesheet" href="../style/signup.css">
  </head>
  <body>
	<!-- Hero Banner-->
	<div class="Level has-background-grey-dark has-text-centered">
		<div style = "display: inline;">
			<a href = "../index.php" class = "button is-outlined hbutton">Home</a>
			<h1 class="title is-1 has-text-light">CAMAGRU</h1>
		</div>
			 <p class="subtitle has-text-light">A social media app!</p>
	</div>
		<section class="section">
		<div class="columns">
			<div class="column">
			</div>
			<div class="column">
				<div class="box has-text-centered has-background-grey-dark">
					<h1 class="title is-3 has-text-light">SIGN UP</h1>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="field">
						<!-- <div class="control"> -->
							<input class="input is-large" type="text" name="username_signup" placeholder="Username" required>
						<!-- </div> -->
					</div>
					<div class="field">
						<!-- <div class="control"> -->
							<input class="input is-large" type="password" name="password_signup" placeholder="Password" required>
						<!-- </div> -->
					</div>
					<div class="field">
						<!-- <div class="control"> -->
							<input class="input is-large" type="email" name="email_signup" placeholder="Email" required>
						<!-- </div> -->
					</div>
						<!-- Take in input from inputs 
							 And parse it along to Cameron's functions-->
						<button type="submit" class="button is-light" name = "submit" value = "submit">Submit</button>
					</form>
				</div>
				<?php
					if (isset($_POST["submit"]))
					{
						$username = htmlspecialchars($_POST["username_signup"]);
						$rawpass = htmlspecialchars($_POST["password_signup"]);
						$email = htmlspecialchars($_POST["email_signup"]);
						if (valid_username($username))
						{
							if (valid_password($rawpass))
							{
								if (valid_email($email))
								{
									add_user($username, $email, $rawpass);
									notify("Succesful signup! Check your email for confirmation.");
								}
								else{
									notify("Invalid email");
								}
							}
							else
							{
								notify("Please ensure your password is not only lowercase letters");
							}
						}
						else{
							notify("Succesful signup! Check your email for confirmation.");
						}
						
					}
				?>
			</div>
			<div class="column">
			<!-- Testing how to make event thingies -->
			<!-- Thingie test ends here -->
			</div>
		</div>
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