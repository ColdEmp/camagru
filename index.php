<?php
 session_start();
?>

<HTML>
	<Head>
	<title>Camagru</title>
	<link rel = "stylesheet" type = "text/css" href = "style/index.css"/>
	</head>
	<body>
			<nav id = "side-menu" class = "side-nav">
				<a href='#' class = btn-close onClick  = "closeSlideMenu()">&times;</a>  
				<a href='#'>Home</a>
				<a href='#'>Gallery</a>
				<a href='#'>Profile</a>
				<a href='#'>Logout</a>
			</nav>
			<div class = "header">
			<span class = open-slide>
					<a href= "#" onClick = "openSlideMenu()">
						<svg width="30" height = "30">
							<path d="M0,5 30,5" stroke = '#fff'
							stroke-width = "5"/>
							<path d="M0,14 30,14" stroke = '#fff'
							stroke-width = "5"/>
							<path d="M0,23 30,23" stroke = '#fff'
							stroke-width = "5"/>
						</svg>
					</a>
			</span>
				<h1 class = "header title">Camagru Name</h1>
			</div>
			<div id = "login">
				<h4 class="ltitle">LOGIN</h4>
			</div>
			<script>
			function openSlideMenu(){
				document.getElementById('side-menu').style.width = '250px';

				document.getElementById('side-menu').style.marginLeft = '250px';
			}
			function closeSlideMenu(){
				document.getElementById('side-menu').style.width = '0px';

				document.getElementById('side-menu').style.marginLeft = '0px';
			}
			</script>
	</body>

</HTML>