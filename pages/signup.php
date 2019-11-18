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
					<div class="field">
						<div class="control">
							<input class="input is-large" type="text" placeholder="Username">
						</div>
					</div>
					<div class="field">
						<div class="control">
							<input class="input is-large" type="password" placeholder="Password">
						</div>
					</div>
					<div class="field">
						<div class="control">
							<input class="input is-large" type="email" placeholder="Email">
						</div>
					</div>
					<div>
						<!-- Take in input from inputs 
							 And parse it along to Cameron's functions-->
						<input type="submit" class="button is-light">
					</div>
				</div>
			</div>
			<div class="column">

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