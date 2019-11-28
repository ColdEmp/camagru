<?php
	include_once "./header.php";
	user_nlogged_redirect();
?>
<link rel="stylesheet" href="../style/viewProfile.css">
	<head>
    	<title>Camagru</title>
	</head>
	<body>
		<!-- Hero Banner-->
		<div class="Level has-background-grey-dark has-text-centered">
			<div style = "display: inline;">
				<div class="dropdown is-hoverable hbutton">
					<div class="dropdown-trigger">
						<button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
							<span>Hover me</span>
							<span class="icon is-small">
								<i class="fa fa-angle-down" aria-hidden="true"></i>
							</span>
						</button>
					</div>
					<div class="dropdown-menu" id="dropdown-menu4" role="menu">
						<div class="dropdown-content">
							<div class="dropdown-item">
								<aside class="menu">
									<ul class="menu-list">
										<li><a class = "inactivelink">Profile</a></li>
										<li><a href = "./editor.php">Editor</a></li>
										<li><a href = "../log/logout.php">Logout</a></li>
									</ul>
								</aside>
							</div>
						</div>
					</div>
				</div>
				<!-- <a href = "../index.php" class = "button is-outlined hbutton">Home</a> -->
				<h1 class="title is-1 has-text-light">CAMAGRU</h1>
			</div>
			<p class="subtitle has-text-light">A social media app!</p>
		</div>
		<!-- Main Content -->
		<section class="section">
			<div class="columns">
				<div class="column">
					
				</div>
				<div class="column is-half">
					<div class="box has-text-centered has-background-grey-dark" id = "prof_box">
						<h1 class="title is-3 has-text-light">PROFILE</h1>
						<ul class="menu-list has-text-light b_1">
							<li><p>UserName:<span id = "user_name"><?php echo $_SESSION["username"];?></span></p></li>
						</ul>
						<ul class="menu-list has-text-light b_1">
							<li><p>Email Address:<span id = "user_email"><?php echo $_SESSION["user_email"];?></span></p></li>
						</ul>
						<ul class="menu-list has-text-light b_1">
							<li><p>Email Address:<span id = "user_email"><?php echo $_SESSION["user_email"];?></span></p></li>
						</ul>
						<div class = "button_padding">
							<!-- Take to relevant edit page -->
							<a class = "button" id = "edt_name" href = "./changeName.php">Change Username</a>
							<a class = "button" style = "margin:auto" href = "./changePass.php">Change Password</a>
							<a class = "button" id = "edt_email"href = "./changeEmail.php">Change Email</a>
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