<?php
	include_once './header.php';
?>

<!DOCTYPE html>
<html>
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
					<form method="post">
					<div class="field">
						<div class="control">
							<input class="input is-large" type="text" name="username_signup" placeholder="Username" required>
						</div>
					</div>
					<div class="field">
						<div class="control">
							<input class="input is-large" type="password" name="password_signup" placeholder="Password" required>
						</div>
					</div>
					<div class="field">
						<div class="control">
							<input class="input is-large" type="email" name="email_signup" placeholder="Email" required>
						</div>
					</div>
					<div>
						<!-- Take in input from inputs 
							 And parse it along to Cameron's functions-->
						<button type="submit" class="button is-light" name = "submit" value = "submit" onclick="myFunction">Sumbitch</button>
					</div>
					</form>
					<!-- removed php bit -->
				</div>
			</div>
			<div class="column">
			<!-- Testing how to make event thingies -->

				<div>
					<!-- <input type="submit" class="button is-light" onclick="echo(Yo momma)"> -->
					<p>Some stuff is going in here</p>
					<p id="demo"></p>

					<button onclick="myFunction()">Click me</button>
					

					<p id="demo"></p>

					<p>A function is triggered when the button is clicked. The function outputs some text in a p element with id="demo".</p>

					<script>
					function myFunction() {
					  document.getElementById("demo").innerHTML = "Heinrich you suck at stuff";
					 console.log( <?php
						if(isset($_POST['submit']))
						{
							$username = $_POST["username_signup"];
							$email = $_POST["email_signup"];
							$raw_password = $_POST["password_signup"];
							add_user($username, $email, $raw_password);

						}

						?>);
						console.log("ZA WARUDO");
					//   add_user("username_signup", "password_signup", "email_signup");
					}
					</script>

				</div>
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