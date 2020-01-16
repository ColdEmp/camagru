<?php
	include_once "../pages/header.php";
?>
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<link rel="shortcut icon" href="#">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/index.css">
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
					<div class="container">
						<h2 class="title has-text-centered">Gallery</h2>
						<div class="post">
							<figure class ="image is-1by1 imgpadding">
								<img src="../images/0001.png" alt="Image">
							</figure>
							<div style = "display:inline">
								<span><p class="title has-text-light username">Username</p></span>
								<span class="icon is-small">
								<!-- if liked -->
								<!-- <i class="fa fa-heart-broken"></i> -->
								<!-- if not liked -->
									<i class="fa fa-heart"></i>
								</span>
							</div>
						</div>
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