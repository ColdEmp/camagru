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
			<p class="subtitle has-text-light">A social media app!</p>
		</div>
		<section class="section is-centered">
			<div class="columns">
				<div class="column"></div>
				<div class="column">
				<div class="webcam">
						<video id = "video" playsinline autoplay></video>
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
	function openSlideMenu() {
			document.getElementById('side-menu').style.width = '250px';
		}
		function closeSlideMenu() {
			document.getElementById('side-menu').style.width = '0';
		}
		'user strict';
		const video = document.getElementById('video');
		const canvas = document.getElementById('canvas');
		const snap = document.getElementById('snap');
		const btnDisplay = document.getElementById('btnDisplay');
		const btnDownload = document.getElementById('btnDownload');
		const errorMsgElement = document.getElementById('span#ErrorMsg');
		var capture = 0;
		const constraints = {
			// audio: true,
			video: {
				width: 640, height: 480
			}
		};
		// Access webcam
		async function init() {
			try {
				const stream = await navigator.mediaDevices.getUserMedia(constraints);
				handleSuccess(stream);
			}
			catch(e){
				errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
				alert('Something is wrong');
			}
		}
		// Success
		function handleSuccess(stream){
			window.stream = stream;
			video.srcObject = stream;
		}
		// Load init
		init();
		// Draw image
		var context = canvas.getContext('2d');
			width = 640;
			height = 480;
		var img = new Image;
		var	s_canvas;
		snap.addEventListener("click",function(){
			capture = 1;
			context.drawImage(video, 0, 0, width, height);
		});

		btnDisplay.addEventListener("click", function () {
			const dataURI = canvas.toDataURL('image/jpeg', 1.0);
			console.log(dataURI);
		});
		// navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
		// 	if(navigator.getUserMedia){
		// 		navigator.getUserMedia({video:true},handleVideo,videoError);
		// 	}

		// 	function handleVideo(stream){
		// 	document.querySelector('#video').src = window.URL.createObjectURL(stream);
		// 	}

		// 	function videoError(e){
		// 		alert('Something is wrong');
		// 	}
			// const camvideo = document.getElementById('camvideo');
			// const constraints = 
			// {
			// 	video:
			// 	{
			// 		minAspectRatio: 1.333,
			// 		minFrameRate: 60,
			// 		width: 640,
			// 		heigth: 480
			// 	}
			// };
			// const stream = await navigator.mediaDevices.getUserMedia(constraints);	
			// window.stream = stream;
			// camvideo.srcObject = stream;
		</script>
</html>