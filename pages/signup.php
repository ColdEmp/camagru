<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
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
						<input type="submit" class="button is-light" onclick="add_user()">
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