<?php
include_once "./header.php";
user_nlogged_redirect();
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
				<div class="dropdown is-hoverable hbutton">
					<div class="dropdown-trigger">
						<button class="button" onclick = "myFunction()">
							<span><?php echo $_SESSION["username"]?></span>
							<span class="icon is-small">
								<i class="fa fa-angle-down" ></i>
							</span>
						</button>
					</div>
					<div class="dropdown-menu" id="dropdown-menu4" role="menu">
						<div class="dropdown-content">
							<div class="dropdown-item">
								<aside class="menu">
									<ul class="menu-list">
										<li><a href = "../index.php">Home</a></li>
										<li><a href = "./viewProfile.php">Profile</a></li>
										<li><a href = "./editor.php">Editor</a></li>
										<li><a href = "../log/logout.php">Logout</a></li>
									</ul>
								</aside>
							</div>
						</div>
					</div>
				</div>
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
				notify("New password and repeat password don't match");
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