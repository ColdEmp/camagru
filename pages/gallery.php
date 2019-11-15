<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camagru</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="stylesheet" href="../style/gallery.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
						<li><a href = "./viewProfile.php">View Profile</a></li>
						<li><a>Logout</a></li>
					</ul>
					<p class="menu-label">
						Editing
					</p>
					<ul class="menu-list">
						<li><a>Editor</a></li>
						<li><a class = "inactivelink">View gallery</a></li>
					</ul>
				</aside>
			</div>
			<div class="column is-half">
				<div class="box has-text-centered has-background-grey-dark" id = "prof_box">
					<div class="block">
						<img src="../images/illidan1.jpeg" alt="test" class="image">
						<article class="media">
							<figure class="media-left">
								<p class="image is-64x64">
								<img src="https://versions.bulma.io/0.8.0/images/placeholders/128x128.png">
							</p>
						</figure>
						<div class="media-content">
							<div class="content has-text-light">
								<p>
									<strong class="has-text-light is-4">USERNAME</strong>
									<br>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
								</p>
							</div>
							<nav class="level is-mobile">
								<div class="level-left">
									<a class="level-item">
										<span class="icon is-small"><i class="fa fa-comment"></i></span>
									</a>
								  	<a class="level-item">
										<span class="icon is-small"><i class="fa fa-heart"></i></span>
									</a>
								</div>
							  </nav>
							</div>
							<div class="media-right">
							  <button class="delete"></button>
							</div>
						  </article>
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