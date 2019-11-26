<?php
	include_once "./header.php";
	user_nlogged_redirect();
?>
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
											<input class="input is-large" type="password" name = "old_pass" placeholder="Old Password">
									</div>
								</div>
								<div class="field">
									<div class="control">
											<input class="input is-large" type="password" name = "new_pass" placeholder="New Password">
									</div>
								</div>
								<div class="field">
									<div class="control">
											<input class="input is-large" type="password" name = "confirm_pass" placeholder="Repeat Password">
									</div>
								</div>
								<div>
									<button class="button" name = "change" value = "change">Change Password</button>
								</div>
							</form>
						</div>
						<?php
					if (isset($_POST["change"]))
					{
						if(valid_login($_SESSION["username"], $_POST['old_pass']))
						{
							if(valid_password($_POST["new_pass"])){
								if($_POST["new_pass"] == $_POST["confirm_pass"]){
									change_password($_SESSION["username"],$_POST["new_pass"]);
									header("Location: ./viewProfile.php");
								}
								else{
									notify("New password and repeat password");
								}
							}
							else{
								notify("New Password is invalid");
							}
						}
						else{
							notify('Invalid old password');
						}
					}
				?>
					</div>
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