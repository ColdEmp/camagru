<?php
include_once './header.php';
user_logged_redirect();
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/signup.css">
	<head>
	<title>Camagru</title>
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
			</div>
			<div class="column"></div>
		</div>
	</section>
		<footer class="credits footer has-background-grey">
				<div class="content has-text-centered has-text-light">
					<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
					<a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
					<a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
				</div>
		</footer>
	</body>
</html>
<?php
	if (isset($_POST["submit"]))
	{
		$username = htmlspecialchars($_POST["username_signup"]);
		$rawpass = htmlspecialchars($_POST["password_signup"]);
		$email = htmlspecialchars($_POST["email_signup"]);
		if (valid_username($username))
		{
			if(find_specified("username", "users", "username", $username) == NULL)
			{
				if (valid_password($rawpass))
				{
					if(find_specified("email", "users", "email", $email) == NULL)
					{	
						if (valid_email($email) == 1)
						{
							add_user($username, $email, $rawpass);
							notify("Succesful signup! Check your email for confirmation.");
						}
						else{
							notify("Invalid email");
						}
					}
					else{
						notify("That email is already in use");
					}
				}
				else{
					notify("Please ensure your password is not only lowercase letters");
				}
			}
			else{
				notify("Username is already in use");
			}
		}
		else
		{
			notify("Only alphanumeric characters may be used for the username.");	
			}
	}
?>