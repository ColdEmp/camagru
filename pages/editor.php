<?php
	include_once "./header.php";
	user_nlogged_redirect();
?>
<link rel="stylesheet" href="../style/editor.css">
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
					<div class="dropdown-menu" id="dropdown-menu3" role="menu">
						<div class="dropdown-content">
							<a href="../index.php" class="dropdown-item">
								Home
							</a>
							<a href="./viewProfile.php" class="dropdown-item">
								Profile
							</a>
							<a href="../log/logout.php" class="dropdown-item">
								Logout
							</a>
						</div>
					</div>
				</div>
				<h1 id = "lil" class="title is-1 has-text-light">CAMAGRU</h1>
			</div>
			<p id = wanka class="subtitle has-text-light">A social media app!</p>
		</div>
		<section class="section is-centered">
			<div class="columns">
				<div class="column"></div>
				<div class="column">
					<div class="webcam">
						<video id = "video" playsinline autoplay></video>
					</div>
					<div style = "padding : 0px 0px 20px 0px">
					<canvas id="myCanvas" width="200" height="200"></canvas>
					</div>
				</div>
				<div class="column"></div>
			</div>
		</section>
		<script>
			const video = document.getElementById('video');

			video.srcObject = stream;
		</script>
		<footer class="credits has-background-grey">
			<div class="content has-text-centered has-text-light">
				<p>Camagru by <a class ="has-text-light is-italic" href="https://github.com/cameronglanville">Cameron Glanville</a>,
			 	<a class ="has-text-light is-italic" href="https://github.com/hbarnardWTC">Heinrich Barnard</a>,
				<a class ="has-text-light is-italic" href="https://github.com/CaptainRedBear">Timothy Webb</a>.</p>
			</div>
		</footer>
	</body>
</html>