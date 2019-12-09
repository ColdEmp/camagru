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
					<div class="dropdown-menu" id="dropdown-menu4" role="menu">
						<div class="dropdown-content">
							<div class="dropdown-item">
								<aside class="menu">
									<ul class="menu-list">
										<li><a href = "../index.php">Home</a></li>
										<li><a href = "./viewProfile.php">Profile</a></li>
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
					<div class="webcam">
						<video id = "video" playsinline autoplay>Video unsupported</video>
					</div>
					<br />
					<div class="canvas_photo">
						<canvas id="canvas" width="640" height="480"></canvas>
					</div>
					<p>Webcam use</p>
					<button id="snap" class="btn">Capture</button>
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
		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');
		const snap = document.getElementById('snap');
		const btnDisplay = document.getElementById('btnDisplay');
		const btnDownload = document.getElementById('btnDownload');
		const errorMsgElement = document.getElementById('span#ErrorMsg');
		var capture = 0;
		const constraints = {
			video: {
				width: 640, height: 480
			}
		};

		async function setup() {
			try {
				const stream = await navigator.mediaDevices.getUserMedia(constraints);
				window.stream = stream;
				video.srcObject = stream;
			}
			catch(e){
				errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
				alert('Something is wrong');
			}
		}
		setup();
		var context = canvas.getContext('2d');
		var img = new Image;
		var	s_canvas;
		snap.addEventListener("click",function(){
			capture = 1;
			context.drawImage(video, 0, 0, 640, 480);
		});

		btnDisplay.addEventListener("click", function () {
			const dataURI = canvas.toDataURL('image/jpeg', 1.0);
			console.log(dataURI);
		});
		</script>
</html>