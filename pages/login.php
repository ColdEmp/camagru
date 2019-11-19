<?php
	include_once './header.php';
?>
	<link rel="stylesheet" href="./style/login.css">
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
					<aside class="menu">
						<p class="menu-label">
							Profile
						</p>
						<ul class="menu-list">
							<li><a href = "./viewProfile.php">View Profile</a></li>
							<li><a>Logout</a></li>
							<li><a>Editor</a></li>
						</ul>
					</aside>
			</div>
			<!-- END OF SIDE MENU -->
			<!-- LOGIN -->
			<div class="column">
				<div class="box has-text-centered has-background-grey-dark" id = "loginbox">
					<h1 class="title is-3 has-text-light">LOGIN</h1>
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
					<div>
						<button class="button" id = "loginbutton">Login</button>
						<a href="./signup.php" class="button" id = "signupbutton">Sign up</a>
					</div>
				</div>
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