<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
<link rel="stylesheet" href="../style/viewProfile.css">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<!-- Main Content -->
		<section class="section">
			<div class="columns">
				<div class="column">
					<aside class="menu">
						<p class="menu-label">
							Profile
						</p>
						<ul class="menu-list">
							<li><a class = "inactivelink">View Profile</a></li>
							<li><a>Logout</a></li>
						</ul>
						<p class="menu-label">
							Editing
						</p>
						<ul class="menu-list">
							<li><a>Editor</a></li>
							<li><a href = "./gallery.php">View gallery</a></li>
						</ul>
					</aside>
				</div>
				<div class="column is-half">
					<div class="box has-text-centered has-background-grey-dark" id = "prof_box">
						<h1 class="title is-3 has-text-light">PROFILE</h1>
						<ul class="menu-list has-text-light b_1">
							<li><p>UserName:<span id = "user_name">	NAME</span></p></li>
						</ul>
						<ul class="menu-list has-text-light b_1">
							<li><p>Email Address:<span id = "user_email">wet.email.co.za</span></p></li>
						</ul>
						<div style = "padding:10px 0 10px 0">
							<!-- Take to relevant edit page -->
							<a class = "button" id = "edt_name" href = "#">Edit Username</a>
							<a class = "button" id = "edt_email"href = "#">Change Email</a>
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