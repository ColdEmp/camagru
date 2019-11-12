<!-- <HTML lang="en">
	<Head>
	<title>Camagru</title>
		<iframe style="display:none" src="https://www.youtuberepeater.com/watch?v=5xxQs34UMx4#gsc.tab=0" frameborder="0" allowfullscreen allow="autoplay" loop="true"></iframe>
		<iframe style="display:none" src="https://www.youtuberepeater.com/watch?v=tt5SdjfNuGU#gsc.tab=0" frameborder="0" allowfullscreen allow="autoplay" loop="true"></iframe>
		<link rel = "stylesheet" href = "./style/bulma.css"/>
		<link rel = "stylesheet" href = "./style/index.css"/>
	</head> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="stylesheet" href="./style/index.css">
  </head>
  <body>
	<!-- Hero Banner-->
   	<div class="hero has-background-grey-dark has-text-centered">
    	<h1 class="title is-1 has-text-light">CAMAGRU</h1>
	 	<p class="subtitle has-text-light">A social media app!</p>
	</div>
	<section class="section is-centered">
	<!-- Main body -->
		<div class="columns">
			<!--Side Menu-->
			<div class="column">
					<aside class="menu">

						<p class="menu-label">
							Profile
						</p>
						<ul class="menu-list">
							<li><a>View Profile</a></li>
							<li><a>Edit Profile</a></li>
							<li><a>Logout</a></li>
						</ul>
						<p class="menu-label">
							Editing
						</p>
						<ul class="menu-list">
							<li><a>Edit a photo</a></li>
							<li><a>View your gallery</a></li>
						  	<li><a>View camagru gallery</a></li>
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
						<a href="./signup.html" class="button" id = "signupbutton">Sign up</a>
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