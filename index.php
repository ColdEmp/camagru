<?php
 include_once "./pages/header.php";
?>
  <head>
    <title>Camagru</title>
	<link rel="stylesheet" href="./style/index.css">
  </head>
  <body>
	<!-- Hero Banner-->
	<div class="Level has-background-grey-dark has-text-centered">
		<div style = "display: inline;">
		<?php
		if (isset($_SESSION["username"])){
			echo '<a href = "./login.php" class = "button is-outlined logbutton">Login</a>';
		}
		else
		{
			echo '<a href = "./pages/login.php" class = "button is-outlined logbutton">Login</a>';
		}
		?>
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
						<li><a href = "./pages/viewProfile.php">View Profile</a></li>
						<li><a>Logout</a></li>
						<li><a>Editor</a></li>
					</ul>
				</aside>
			</div>
			<div class="column">
				<div class="box has-text-centered has-background-grey-dark" id = "prof_box">
					<div class="block">
						<img src="./images/illidan1.jpeg" alt="test" class="image">
						<article class="media">
							<figure class="media-left">
								<p class="image is-64x64">
							</p>
							</figure>
							<div class = "media-content">
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