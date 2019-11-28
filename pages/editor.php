<?php
	include_once "./header.php";
	user_nlogged_redirect();
?>
<link rel="stylesheet" href="../style/change.css">
	<head>
    	<title>Camagru</title>
	</head>
	<body>
		<!-- Hero Banner-->
		<div class="Level has-background-grey-dark has-text-centered">
			<div style = "display: inline;">
				<div class="dropdown hbutton">
					<div class="dropdown-trigger">
						<button class="button" onclick = "myFunction()">
							<span>Click me</span>
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
					<div style = "padding : 0px 0px 20px 0px">
					<canvas id="myCanvas" width="200" height="200"></canvas>
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
		<script>
		function myFunction() {
		var x = document.getElementById("dropdown-menu3");
		if (x.style.display == "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
		}
		</script>
		<!-- <script>
			function toggle() {
				var rip = document.getElementByID("lil");
				rip.style.visibility = "hidden";
				// if ( !(rip.classList.contains("is-active")))
				// 	rip.classList.remove("is-active");
				// } else {
				// 	rip.classList.add("is-active");
				// }

				var disp = document.getElementByID("dropdown-menu3");
				if ( !(document.getElementById("MyElement").classList.contains("is-active")))
					disp.classList.remove("is-active");
				} else {
					disp.classList.add("is-active");
				}
			}
		</script> -->
	</body>
</html>