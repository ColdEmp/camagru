<?php
	include_once "../pages/header.php";
	$username = $_GET['username'];
	$verification_token = $_GET['verification_token'];
	if(!valid_token($username, $verification_token))
	{
   		//header("Location: ../index.php");
	}
//capture a password and pass that password to:
//change_password($username,$new_password);
?> 
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/change.css">
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
		<section class="section is-centered">
			<div class="columns">
				<div class="column"></div>
				<div class="column">
					<div style = "padding : 0px 0px 20px 0px">
						<div class="box has-text-centered has-background-grey-dark">
							<h1 class="title is-3 has-text-light">New Password</h1>
							<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<div class="field">
									<div class="control">
											<input class="input is-large" type="password" name = "change_password" placeholder="New Password">
									</div>
								</div>
								<div>
								<button type="submit" class="button is-light" name = "submit" value = "submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
					<?php
					if (isset($_POST["submit"]))
					{
						if(valid_password($_POST["change_password"])){
							change_password($username,$_POST["change_password"]);
							notify($username);
						//	header("Location: ./login.php");
						}
						else
						{
							notify("New password cannot be only lowercase letters");
						}
					}
					?>
				</div>
				<div class="column"></div>
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
