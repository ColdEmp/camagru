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
							<div class="info">
								<span><p class="has-text-light username left">
									Username<i class="fa fa-heart right whitecolour" id = "like" onclick="color_change('like')"></i>
									<i class="fa fa-comment right whitecolour"></i>
								</p></span>
							</div>
							<div class = "comments">
								<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
									<div class="commentbox">
										<div class="field">
											<div class="control">
												<input class="input is-large" type="textarea" name="newcomment" placeholder="Large input">
											</div>
											<button type="submit" class="button is-light" name = "submit" value = "submit">Submit</button>	
										</div>
									</div>
								</form>
								<div class="commentbox">
									<p class="commentusername">CommentUsername <i class="fa fa-times-circle right deletecolour" id = "delete"></i></p>
									<div class = "commenttextbox">
										<p class = "is-medium scroll">
											dfgsijndfgsjindfgijndfgshnuidfgiungdfsinudfgjnuidfgijnfgijnd
										</p>
									</div>
								</div>
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
	<script>
		function color_change(like)
		{
			var colour = getComputedStyle(document.getElementById(like)).color;
			if(colour === 'rgb(255, 255, 255)')
			{
				colour = document.getElementById(like).style.color = 'rgb(180, 0, 0)';
			}
			else if(colour === 'rgb(180, 0, 0)')
			{
				colour = document.getElementById(like).style.color = 'rgb(255, 255, 255)';
			}
		}
	</script>
</html>